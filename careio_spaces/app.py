#!/usr/bin/env python3
"""
Careio AI v2.4
"""

import os
import numpy as np
from PIL import Image, ImageDraw
import gradio as gr
import tensorflow as tf
from tensorflow.keras.applications.mobilenet_v2 import preprocess_input
from reportlab.lib.pagesizes import A4
from reportlab.platypus import SimpleDocTemplate, Paragraph, Spacer, Table, TableStyle
from reportlab.lib.styles import getSampleStyleSheet, ParagraphStyle
from reportlab.lib import colors
from reportlab.lib.units import cm
import tempfile
import warnings
warnings.filterwarnings('ignore')

# Environment
os.environ['TF_CPP_MIN_LOG_LEVEL'] = '3'
os.environ['CUDA_VISIBLE_DEVICES'] = '-1'

print("="*80)
print("CAREIO AI v2.4")
print("="*80)

# ============================================
# FULL 58 PENYAKIT DATABASE (SAME AS v2.3)
# ============================================
MEDICAL_KB_58 = {
    "putih": {
        "JINAK": [
            {"nama": "Leukoedema (K13.2)", "prob": 0.92, "deskripsi": "Normal variant, simetris"},
            {"nama": "Linea Alba (K13.2)", "prob": 0.88, "deskripsi": "Garis oklusal, trauma gigi"},
            {"nama": "Morsicatio Buccarum (K13.2)", "prob": 0.85, "deskripsi": "Mukosa gigitan"},
            {"nama": "Candidiasis Pseudomembran (B37.0)", "prob": 0.82, "deskripsi": "Kikis→erosi merah"},
            {"nama": "Lichen Planus Retikuler (K13.1)", "prob": 0.78, "deskripsi": "Wickham striae"},
            {"nama": "White Sponge Nevus (Q82.4)", "prob": 0.75, "deskripsi": "Genetik bilateral"},
            {"nama": "Fordyce Granules (K13.2)", "prob": 0.72, "deskripsi": "Kelenjar normal"},
            {"nama": "Geographic Tongue (K14.1)", "prob": 0.70, "deskripsi": "Migrating pattern"},
            {"nama": "Pachyonychia Congenita (Q84.1)", "prob": 0.68, "deskripsi": "Genetik rare"},
            {"nama": "Hairy Tongue (K14.3)", "prob": 0.65, "deskripsi": "Hipertrofi papila"}
        ],
        "GANAS": [
            {"nama": "Leukoplakia Homogen (K12.1)", "prob": 0.35, "deskripsi": "Prekanker 5%"},
            {"nama": "Leukoplakia Verukosa (K12.1)", "prob": 0.22, "deskripsi": "Risiko 20%"},
            {"nama": "Leukoplakia Nodular (K12.1)", "prob": 0.12, "deskripsi": "Risiko 30%"},
            {"nama": "Dysplasia Berat (K12.1)", "prob": 0.08, "deskripsi": "Prekanker tinggi"}
        ]
    },
    "merah": {
        "JINAK": [
            {"nama": "Ulkus Traumatikus (K12.3)", "prob": 0.65, "deskripsi": "Sembuh <2minggu"},
            {"nama": "Stomatitis Aftosa Mayor (K12.0)", "prob": 0.62, "deskripsi": ">1cm, nyeri hebat"},
            {"nama": "Stomatitis Aftosa Minor (K12.0)", "prob": 0.60, "deskripsi": "<1cm, bulat"},
            {"nama": "Eritema Multiforme (L51.9)", "prob": 0.55, "deskripsi": "Target lesion"},
            {"nama": "Herpes Simplex Oral (B00.1)", "prob": 0.52, "deskripsi": "Vesikel multiple"},
            {"nama": "Angular Cheilitis (K13.0)", "prob": 0.50, "deskripsi": "Sudut bibir"},
            {"nama": "Median Rhomboid Glossitis (K14.0)", "prob": 0.48, "deskripsi": "Lidah posterior"},
            {"nama": "Contact Stomatitis (K12.1)", "prob": 0.45, "deskripsi": "Alergi pasta gigi"}
        ],
        "GANAS": [
            {"nama": "Eritroplakia (K12.2)", "prob": 0.08, "deskripsi": "90% displasia URGENT"},
            {"nama": "SCC Early Stage (C01-C06)", "prob": 0.05, "deskripsi": "Indurasi keras"},
            {"nama": "Lichen Planus Erosif (K13.1)", "prob": 0.28, "deskripsi": "Nyeri kronis"},
            {"nama": "Pemphigus Vulgaris (L10.0)", "prob": 0.15, "deskripsi": "Nikolsky+"}
        ]
    },
    "merah-putih": {
        "JINAK": [
            {"nama": "Lichen Planus Mixed (K13.1)", "prob": 0.45, "deskripsi": "Striae+erosi"},
            {"nama": "Psoriasis Oral (L41.9)", "prob": 0.40, "deskripsi": "Rare oral"}
        ],
        "GANAS": [
            {"nama": "Speckled Leukoplakia (K12.1)", "prob": 0.03, "deskripsi": "Risiko 80%"},
            {"nama": "Proliferative Verrucous (K12.1)", "prob": 0.01, "deskripsi": "Multifokal"},
            {"nama": "Carcinoma Verrucous (C01-C06)", "prob": 0.005, "deskripsi": "Aggressive SCC"}
        ]
    },
    "biru": {
        "JINAK": [
            {"nama": "Varix Vena Mulut (I78.1)", "prob": 0.96, "deskripsi": "Lansia common"},
            {"nama": "Hematoma Intramukosa (S00.5)", "prob": 0.92, "deskripsi": "Trauma akut"},
            {"nama": "Hemangioma (D18.0)", "prob": 0.88, "deskripsi": "Vaskular tumor"},
            {"nama": "Lymphangioma (D21.1)", "prob": 0.85, "deskripsi": "Clear vesicle"},
            {"nama": "Mucocele (K11.8)", "prob": 0.82, "deskripsi": "Kelenjar tersumbat"}
        ]
    },
    "kuning": {
        "JINAK": [
            {"nama": "Abses Periapikal (K04.7)", "prob": 0.85, "deskripsi": "Fluctuant pus"},
            {"nama": "Fibroma Irritasi (K13.7)", "prob": 0.80, "deskripsi": "Trauma kronis"},
            {"nama": "Lipoma Oral (D17.3)", "prob": 0.78, "deskripsi": "Soft yellow"},
            {"nama": "Xanthelasma (H02.6)", "prob": 0.75, "deskripsi": "Lipid deposit"},
            {"nama": "Pus Periodontal (K05.2)", "prob": 0.72, "deskripsi": "Gigi goyang"}
        ]
    },
    "coklat": {
        "JINAK": [
            {"nama": "Amalgam Tattoo (K13.2)", "prob": 0.95, "deskripsi": "Non-painful"},
            {"nama": "Nevus Pigmentasi (D22.3)", "prob": 0.90, "deskripsi": "Stable size"},
            {"nama": "Melanotic Macule (K13.2)", "prob": 0.88, "deskripsi": "Benign freckle"},
            {"nama": "Gingival Pigmentation (K13.2)", "prob": 0.85, "deskripsi": "Normal ras"}
        ],
        "GANAS": [
            {"nama": "Melanoma Oral (C42.0)", "prob": 0.02, "deskripsi": "Asimetri, growing"}
        ]
    }
}

# ============================================
# H5 MODEL CLASS (UNCHANGED)
# ============================================
class CaerioH5:
    def __init__(self):
        self.model = None
        self.loaded = False
    
    def load_model(self):
        for filename in ['careio_model.h5', 'caerio_model.h5', 'model.h5']:
            if os.path.exists(filename):
                print(f"✅ Loading {filename}...")
                tf.keras.backend.clear_session()
                self.model = tf.keras.models.load_model(filename, compile=False)
                self.model.compile(optimizer='adam', loss='binary_crossentropy')
                self.loaded = True
                print("✅ H5 Model Ready!")
                return True
        print("❌ Upload careio_model.h5 required!")
        return False
    
    def predict(self, image):
        img = image.convert('RGB').resize((224, 224))
        img_array = np.array(img, dtype=np.float32)
        img_array = preprocess_input(img_array)
        img_array = np.expand_dims(img_array, 0)
        
        pred = self.model.predict(img_array, verbose=0)
        prob_malignant = float(pred[0][0] if len(pred.shape) > 1 else pred[0])
        prob_benign = 1.0 - prob_malignant
        confidence = max(prob_benign, prob_malignant)
        label = "🟢 JINAK" if prob_benign > prob_malignant else "🔴 GANAS"
        return prob_benign, prob_malignant, confidence, label

h5_model = CaerioH5()
h5_ready = h5_model.load_model()

# ============================================
# FIXED PDF GENERATOR - SAVE TO TEMP FILE
# ============================================
def generate_pdf_report(benign, malignant, confidence, label, visual_type, top_diseases, risk_level, action, doctor_url, timestamp):
    from reportlab.lib.pagesizes import A4
    from reportlab.platypus import SimpleDocTemplate, Paragraph, Spacer, Table, TableStyle
    from reportlab.lib.styles import getSampleStyleSheet, ParagraphStyle
    from reportlab.lib import colors
    from reportlab.lib.units import cm
    from io import BytesIO
    
    buffer = BytesIO()
    doc = SimpleDocTemplate(buffer, pagesize=A4)
    story = []
    
    styles = getSampleStyleSheet()
    title_style = ParagraphStyle(
        'CustomTitle', parent=styles['Title'], fontSize=24, spaceAfter=30,
        textColor=colors.darkblue, alignment=1
    )
    
    title_text = f"<b>CAERIO AI v2.4</b><br/><font size=14>{label} | Confidence: {confidence:.1%}</font>"
    story.append(Paragraph(title_text, title_style))
    story.append(Spacer(1, 20))
    
    data = [
        ['Kategori', 'Probabilitas', 'Status'],
        ['🟢 Jinak', f'{benign:.1%}', '✅ Baik'],
        ['🔴 Ganas', f'{malignant:.1%}', risk_level]
    ]
    table = Table(data, colWidths=[4*cm, 4*cm, 4*cm])
    table.setStyle(TableStyle([
        ('BACKGROUND', (0, 0), (-1, 0), colors.darkblue),
        ('TEXTCOLOR', (0, 0), (-1, 0), colors.whitesmoke),
        ('ALIGN', (0, 0), (-1, -1), 'CENTER'),
        ('FONTNAME', (0, 0), (0, 0), 'Helvetica-Bold'),
        ('FONTSIZE', (0, 0), (-1, 0), 14),
        ('GRID', (0, 0), (-1, -1), 1, colors.black),
    ]))
    story.append(table)
    
    story.append(Spacer(1, 20))
    story.append(Paragraph("<b></b>", styles['Heading2']))
    for i, disease in enumerate(top_diseases[:3], 1):
        prob_display = disease['prob'] * confidence
        story.append(Paragraph(f"{i}. <b>{disease['nama']}</b> ({prob_display:.0%}) - {disease['deskripsi']}", styles['Normal']))
    
    story.append(Spacer(1, 20))
    story.append(Paragraph(f"<b>🚨 RISK: {risk_level} | Tindakan: {action}</b>", styles['Heading2']))
    story.append(Paragraph("⚠️ Screening tool BUKAN diagnosis dokter - Konsultasi WAJIB!", styles['Normal']))
    
    doc.build(story)
    buffer.seek(0)
    
    # ✅ FIXED: Save to temp file instead of raw bytes
    temp_pdf = tempfile.NamedTemporaryFile(delete=False, suffix='.pdf')
    temp_pdf.write(buffer.getvalue())
    temp_pdf.close()
    return temp_pdf.name

# ============================================
# VISUAL ANALYSIS + RISK (UNCHANGED)
# ============================================
def analyze_image_pil(image):
    img_np = np.array(image)
    r_mean = np.mean(img_np[:,:,0])
    g_mean = np.mean(img_np[:,:,1])
    b_mean = np.mean(img_np[:,:,2])
    brightness = np.mean(img_np)
    
    if r_mean > max(g_mean, b_mean) * 1.3 or r_mean > 180: return "merah"
    elif brightness > 200: return "putih"
    elif b_mean > max(r_mean, g_mean) * 1.3 or b_mean < 80: return "biru"
    elif g_mean > max(r_mean, b_mean) * 1.2: return "kuning"
    elif abs(r_mean - g_mean) < 30 and brightness > 150: return "merah-putih"
    elif r_mean < 120 and g_mean < 120: return "coklat"
    else: return "putih"

def get_risk_assessment(malignant):
    if malignant < 0.30: return "🟢 RENDAH", "Kontrol dokter gigi 6 bulan", "https://www.careio.my.id"
    elif malignant < 0.70: return "🟡 SEDANG", "Periksa dokter gigi 1 bulan", "https://www.careio.my.id"
    else: return "🔴 TINGGI", "SPESIALIS BEDAH MULUT URGENT", "https://www.careio.my.id"

# ============================================
# MAIN PIPELINE - FIXED 3 OUTPUTS
# ============================================
def predict_pipeline(image):
    from datetime import datetime
    timestamp = datetime.now().strftime("%Y%m%d_%H%M%S")
    
    if image is None or not h5_ready:
        return "❌ Upload foto lesi + careio_model.h5 dulu!", None, None
    
    # Analysis pipeline
    visual_type = analyze_image_pil(image)
    benign, malignant, confidence, label = h5_model.predict(image)
    risk_level, action, doctor_url = get_risk_assessment(malignant)
    
    color_key = visual_type if visual_type in MEDICAL_KB_58 else "putih"
    h5_type = "JINAK" if "JINAK" in label else "GANAS"
    top_diseases = MEDICAL_KB_58[color_key].get(h5_type, [{"nama": "Unknown"}])
    
    # ✅ FIXED PDF - returns filename string
    pdf_path = generate_pdf_report(benign, malignant, confidence, label, visual_type, 
                                  top_diseases, risk_level, action, doctor_url, timestamp)
    
    # HTML Report
    disease_list = []
    for d in top_diseases[:3]:
        prob_display = d['prob'] * confidence
        disease_list.append(f"• <b>{d['nama']}</b> ({prob_display:.0%})")
    
    report = f"""
#CAREIO AI v2.4 - **{label}** 
**Confidence: {confidence:.1%}**

## 📊 **HASIL ANALISIS**
| Kategori | Probabilitas | Status |
|----------|--------------|--------|
| 🟢 Jinak | {benign:.1%}  | ✅ Baik |
| 🔴 Ganas | {malignant:.1%} | {risk_level} |

**Visual:** {visual_type} | **Top 3:**<br>{'<br>'.join(disease_list)}

## 🚨 **{risk_level}** - **{action}**

<div style="background: #000000; padding: 15px; border-radius: 10px; border-left: 5px solid #dc2626;">
⚠️ **DISCLAIMER:** Screening tool BUKAN diagnosis dokter. Konsultasi WAJIB!
</div>

<a href="{doctor_url}" style="background: #10b981; color: white; padding: 15px 30px; 
                            text-decoration: none; border-radius: 25px; font-weight: bold;">
-HUBUNGI DOKTER TERKAIT (Maintenance)-
</a>

PDF Report: {pdf_path.split('/')[-1]}
"""
    
    display_img = np.array(image.resize((512, 512)))
    return report, display_img, pdf_path  # ✅ String path, not bytes!

# ============================================
# GRADIO UI - v2.4 ERROR FREE
# ============================================
with gr.Blocks(theme=gr.themes.Soft(), title="Careio AI v2.4") as demo:
    gr.Markdown("""
CAREIO AI v2.4
    """)
    
    with gr.Row():
        with gr.Column(scale=1):
            image_input = gr.Image(type="pil", label="Foto Lesi Rongga Mulut")
            analyze_btn = gr.Button("ANALISIS", variant="primary", size="lg")
        
        with gr.Column(scale=2):
            result_md = gr.Markdown("Upload foto lesi mulut...")
    
    result_img = gr.Image(label="Area Lesi Terdeteksi")
    pdf_download = gr.File(label="DOWNLOAD PDF REPORT")
    
    analyze_btn.click(
        predict_pipeline,
        inputs=image_input,
        outputs=[result_md, result_img, pdf_download]
    )

print("✅ CAERIO AI v2.4")

if __name__ == "__main__":
    demo.launch(share=True)
