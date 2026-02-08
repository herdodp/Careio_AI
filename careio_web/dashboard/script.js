// Function to handle logout
function handleLogout() {
    if (confirm('Apakah Anda yakin ingin logout?')) {
        // Di sini Anda bisa tambahkan kode PHP untuk logout
        alert('Logout berhasil!');
        // Uncomment baris di bawah untuk redirect ke halaman logout
        // window.location.href = 'logout.php';
    }
}

// Add smooth scroll behavior
document.addEventListener('DOMContentLoaded', function() {
    console.log('Dashboard Admin loaded successfully');
    
    // Optional: Tambahkan highlight untuk tabel row saat di-click
    const tableRows = document.querySelectorAll('tbody tr');
    tableRows.forEach(row => {
        row.addEventListener('click', function() {
            // Remove previous selection
            tableRows.forEach(r => r.style.backgroundColor = '');
            // Highlight selected row
            this.style.backgroundColor = '#e8f4f8';
        });
    });
});

// Optional: Function untuk konfirmasi sebelum delete (untuk fitur masa depan)
function confirmDelete(id, name) {
    if (confirm(`Apakah Anda yakin ingin menghapus ${name}?`)) {
        // Tambahkan kode untuk delete data
        console.log('Deleting ID:', id);
        // window.location.href = `delete.php?id=${id}`;
    }
}

// Optional: Function untuk export table ke CSV (untuk fitur masa depan)
function exportTableToCSV(filename) {
    const table = document.querySelector('table');
    let csv = [];
    const rows = table.querySelectorAll('tr');
    
    for (let i = 0; i < rows.length; i++) {
        let row = [], cols = rows[i].querySelectorAll('td, th');
        
        for (let j = 0; j < cols.length; j++) {
            row.push(cols[j].innerText);
        }
        
        csv.push(row.join(','));
    }
    
    // Download CSV
    downloadCSV(csv.join('\n'), filename);
}

function downloadCSV(csv, filename) {
    let csvFile;
    let downloadLink;
    
    csvFile = new Blob([csv], {type: 'text/csv'});
    downloadLink = document.createElement('a');
    downloadLink.download = filename;
    downloadLink.href = window.URL.createObjectURL(csvFile);
    downloadLink.style.display = 'none';
    document.body.appendChild(downloadLink);
    downloadLink.click();
}