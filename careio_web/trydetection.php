<?php 
//include "koneksi.php";
//session_start();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Try detection</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Updated to world-class typography with Work Sans and Open Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            /* Updated to premium typography matching tech giants */
            font-family: 'Open Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            line-height: 1.6;
            color: #4b5563;
            overflow-x: hidden;
            background: #ffffff;
        }

        /* Premium typography hierarchy matching Apple/Google standards */
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Work Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            font-weight: 700;
            line-height: 1.2;
            letter-spacing: -0.025em;
        }

        /* Completely redesigned header with transparent sticky navigation */
        header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            color: #4b5563;
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .logo {
            font-family: 'Work Sans', sans-serif;
            font-size: 1.75rem;
            font-weight: 700;
            color: #0891b2;
            text-decoration: none;
            letter-spacing: -0.02em;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 3rem;
        }

        .nav-links a {
            color: #4b5563;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 0.95rem;
            position: relative;
        }

        .nav-links a:hover {
            color: #0891b2;
        }

        /* Added Apple-style CTA button in navigation */
        .nav-cta {
            background: linear-gradient(135deg, #0891b2, #0ea5e9);
            color: white !important;
            padding: 12px 24px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(8, 145, 178, 0.2);
        }

        .nav-cta:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(8, 145, 178, 0.3);
            color: white !important;
        }

        .mobile-menu {
            display: none;
            flex-direction: column;
            cursor: pointer;
        }

        .mobile-menu span {
            width: 25px;
            height: 2px;
            background: #4b5563;
            margin: 3px 0;
            transition: 0.3s;
            border-radius: 2px;
        }

        /* Completely redesigned hero section with modern layout */
        .hero {
            background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
            color: #4b5563;
            padding: 140px 0 120px;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Added subtle geometric background pattern */
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%230891b2' fill-opacity='0.03'%3E%3Cpath d='M50 50c0-13.8-11.2-25-25-25s-25 11.2-25 25 11.2 25 25 25 25-11.2 25-25zm25 0c0-13.8-11.2-25-25-25s-25 11.2-25 25 11.2 25 25 25 25-11.2 25-25z'/%3E%3C/g%3E%3C/svg%3E") repeat;
        }

        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 6rem;
            align-items: center;
        }

        .hero-text h1 {
            /* Apple-style large hero headline */
            font-size: 4.5rem;
            margin-bottom: 2rem;
            animation: fadeInUp 1s ease;
            font-weight: 700;
            color: #1f2937;
            line-height: 1.1;
        }

        .hero-text p {
            font-size: 1.25rem;
            margin-bottom: 3rem;
            animation: fadeInUp 1s ease 0.2s both;
            color: #6b7280;
            font-weight: 400;
            line-height: 1.6;
        }

        /* Added hero visual element */
        .hero-visual {
            display: flex;
            justify-content: center;
            align-items: center;
            animation: fadeInUp 1s ease 0.4s both;
        }

        .hero-card {
            background: white;
            padding: 3rem;
            border-radius: 24px;
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(0, 0, 0, 0.05);
            text-align: center;
            max-width: 400px;
        }

        .hero-icon {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #0891b2, #8b5cf6);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            font-size: 3rem;
            color: white;
            box-shadow: 0 15px 40px rgba(8, 145, 178, 0.3);
        }

        .cta-buttons {
            display: flex;
            gap: 1.5rem;
            animation: fadeInUp 1s ease 0.6s both;
        }

        .cta-primary {
            background: linear-gradient(135deg, #0891b2, #0ea5e9);
            color: white;
            padding: 18px 36px;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.4s ease;
            box-shadow: 0 8px 25px rgba(8, 145, 178, 0.3);
            border: none;
            cursor: pointer;
        }

        .cta-secondary {
            background: transparent;
            color: #0891b2;
            padding: 18px 36px;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.4s ease;
            border: 2px solid #0891b2;
        }

        .cta-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(8, 145, 178, 0.4);
        }

        .cta-secondary:hover {
            background: #0891b2;
            color: white;
            transform: translateY(-3px);
        }

        /* Redesigned section layout with better spacing */
        .section {
            padding: 120px 0;
            max-width: 1400px;
            margin: 0 auto;
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .section h2 {
            font-size: 3.5rem;
            text-align: center;
            margin-bottom: 1.5rem;
            color: #1f2937;
            font-weight: 700;
            letter-spacing: -0.025em;
        }

        .section-subtitle {
            text-align: center;
            font-size: 1.25rem;
            color: #6b7280;
            margin-bottom: 5rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Modern card grid layout */
        .about-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
            gap: 3rem;
            margin-top: 5rem;
        }

        .about-card {
            background: white;
            padding: 3rem;
            border-radius: 24px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
            transition: all 0.4s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
            position: relative;
        }

        .about-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.12);
        }

        .about-card h3 {
            color: #0891b2;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .about-card p {
            color: #6b7280;
            line-height: 1.7;
            font-size: 1rem;
        }

        /* Services section with alternating background */
        .services {
            background: #f8fafc;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 3rem;
            margin-top: 5rem;
        }

        .service-card {
            background: white;
            padding: 3rem;
            border-radius: 24px;
            text-align: left;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
            transition: all 0.4s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.12);
        }

        .service-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #0891b2, #8b5cf6);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2rem;
            font-size: 2rem;
            color: white;
            box-shadow: 0 8px 25px rgba(8, 145, 178, 0.2);
        }

        .service-card h3 {
            color: #1f2937;
            margin-bottom: 1rem;
            font-size: 1.4rem;
            font-weight: 600;
        }

        .service-card p {
            color: #6b7280;
            line-height: 1.6;
            font-size: 1rem;
        }

        /* Premium download section design */
        .download-section {
            background: linear-gradient(135deg, #0891b2 0%, #8b5cf6 100%);
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .download-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 4rem;
            border-radius: 32px;
            backdrop-filter: blur(20px);
            margin-top: 3rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 3rem;
        }

        .download-card h3 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            font-weight: 600;
        }

        .download-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 3rem;
        }

        .download-button {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 16px 32px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.4s ease;
            backdrop-filter: blur(10px);
        }

        .download-button:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
        }

        /* Modern contact section layout */
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 6rem;
            margin-top: 5rem;
        }

        .contact-info {
            background: #f8fafc;
            padding: 4rem;
            border-radius: 24px;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .contact-form {
            background: white;
            padding: 4rem;
            border-radius: 24px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .form-group {
            margin-bottom: 2rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.8rem;
            font-weight: 600;
            color: #1f2937;
            font-size: 0.95rem;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: 'Open Sans', sans-serif;
            background: #f9fafb;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #0891b2;
            background: white;
            box-shadow: 0 0 0 3px rgba(8, 145, 178, 0.1);
        }

        /* Modern footer design */
        footer {
            background: #1f2937;
            color: #9ca3af;
            text-align: center;
            padding: 4rem 0;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Enhanced mobile responsive design */
        @media (max-width: 1024px) {
            .hero-content {
                grid-template-columns: 1fr;
                gap: 4rem;
                text-align: center;
            }

            .hero-text h1 {
                font-size: 3.5rem;
            }

            .contact-grid {
                grid-template-columns: 1fr;
                gap: 4rem;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background: rgba(255, 255, 255, 0.98);
                backdrop-filter: blur(20px);
                flex-direction: column;
                padding: 2rem 0;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                border-top: 1px solid rgba(0, 0, 0, 0.05);
            }

            .nav-links.active {
                display: flex;
            }

            .mobile-menu {
                display: flex;
            }

            .hero-text h1 {
                font-size: 2.8rem;
            }

            .section h2 {
                font-size: 2.5rem;
            }

            .about-grid,
            .services-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .download-buttons {
                flex-direction: column;
                align-items: center;
            }

            .section {
                padding: 80px 1rem;
            }
        }

        @media (max-width: 480px) {
            .hero-text h1 {
                font-size: 2.2rem;
            }

            .section h2 {
                font-size: 2rem;
            }

            .about-card,
            .service-card,
            .contact-info,
            .contact-form {
                padding: 2rem;
            }

            .download-card {
                padding: 2.5rem;
            }
        }

        html {
            scroll-behavior: smooth;
        }

        .loading {
            display: none;
            text-align: center;
            margin: 2rem 0;
        }

        .spinner {
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid white;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>

    <?php 

   // if(isset($_SESSION['username'])){
        ?>

        <!-- open navbar before login 
        <header>
            <nav>
               <div style="display: flex; flex-direction: row; align-items: center; background-color: black; border-radius: 10px; border:none; padding-top: 5px; padding-bottom: 5px; padding-left: 10px; padding-right: 10px;">
                    <img src="img/logo.png" style="width: 70px; height: 70px; margin-right: 10px;">
                    <a href="index.php" class="logo">Caerio AI</a>
                </div>
                <ul class="nav-links" id="navLinks">
                    <li style="margin-left: 10px;"><a href="index.php">Home</a></li>
                    <li style="margin-left: 10px;"><a href="index.php #about">About</a></li>
                    <li style="margin-left: 10px;"><a href="index.php #download">Download Model</a></li>
                    <li style="margin-left: 10px;"><a href="trydetection.php">Try it</a></li>
                    <li style="margin-left: 10px;"><a href="" class="nav-cta">Hi, <?php echo $_SESSION['username']; ?></a> <a href="user/logout.php" style="text-decoration: none; color: red; font-weight: bolder;">Logout</a></li>
                    
                </ul>
                <div class="mobile-menu" id="mobileMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </nav>
        </header>
         close navbar before login -->


        <?php  
   // }else{
        ?>

        <!-- open navbar before login -->
        <header>
            <nav>
                <div style="display: flex; flex-direction: row; align-items: center; background-color: black; border-radius: 10px; border:none; padding-top: 5px; padding-bottom: 5px; padding-left: 10px; padding-right: 10px;">
                    <img src="img/logo.png" style="width: 70px; height: 70px; margin-right: 10px;">
                    <a href="#home" class="logo">Caerio AI</a>
                </div>
                <ul class="nav-links" id="navLinks">
                    <li style="margin-left: 10px;"><a href="index.php">Home</a></li>
                    <li style="margin-left: 10px;"><a href="index.php #about">About</a></li>
                    <li style="margin-left: 10px;"><a href="index.php #download">Download Model</a></li>
                    <li style="margin-left: 10px;"><a href="trydetection.php">Try it</a></li>
                    <!--<li style="margin-left: 10px;"><a href="user/login.php" class="nav-cta">Login/Register</a></li> -->
                </ul>
                <div class="mobile-menu" id="mobileMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </nav>
        </header>
        <!-- close navbar before login -->


        <?php  
   // }
     ?>

    




   

     <!-- open iframe -->
     <div style="margin-bottom:-50px; margin-top: 100px;">
     <iframe
          src="https://herdo33-caerio-ai.hf.space"
          frameborder="0"
          style="width:100%; height:100vh; border:none; overflow:hidden;"
        ></iframe>
    </div>
     <!-- close iframe -->













  


    <script>

    

        // Mobile menu toggle
        const mobileMenu = document.getElementById('mobileMenu');
        const navLinks = document.getElementById('navLinks');

        mobileMenu.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });

        // Close mobile menu when clicking on a link
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('active');
            });
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

      

    

        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.style.background = 'rgba(255, 255, 255, 0.98)';
                header.style.boxShadow = '0 8px 30px rgba(0, 0, 0, 0.1)';
            } else {
                header.style.background = 'rgba(255, 255, 255, 0.95)';
                header.style.boxShadow = 'none';
            }
        });

        // Add animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.about-card, .service-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });
    </script>
</body>
</html>
