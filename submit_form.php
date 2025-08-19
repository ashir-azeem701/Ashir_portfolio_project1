<?php
// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$db   = "contact_form";

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    echo "<script>alert('Database connection failed!');</script>";
    exit();
}

// Get POST data safely
$name        = $conn->real_escape_string($_POST['name']);
$email       = $conn->real_escape_string($_POST['email']);
$message     = $conn->real_escape_string($_POST['message']);
$cnic        = $conn->real_escape_string($_POST['cnic']);
$father_name = $conn->real_escape_string($_POST['father_name']);

// Insert into database
$sql = "INSERT INTO messages (name, email, message, cnic, father_name)
        VALUES ('$name', '$email', '$message', '$cnic', '$father_name')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Your message has been submitted successfully!');</script>";
} else {
    echo "<script>alert('Error occurred while submitting your message.');</script>";
}

$conn->close();
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Portfolio</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Existing styles... */

/* Contact Modal Styles */
.contact-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 1000;
    justify-content: center;
    align-items: center;
}

.contact-content {
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    width: 90%;
    max-width: 500px;
    position: relative;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    animation: modalFadeIn 0.3s ease-out;
}

@keyframes modalFadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.close-modal {
    position: absolute;
    top: 15px;
    right: 15px;
    font-size: 24px;
    cursor: pointer;
    color: #777;
    transition: color 0.3s;
}

.close-modal:hover {
    color: #333;
}

.contact-content h3 {
    margin-top: 0;
    color: #333;
    font-size: 24px;
    margin-bottom: 20px;
}

.contact-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
    padding: 15px;
    background-color: #f9f9f9;
    border-radius: 8px;
}

.contact-info {
    display: flex;
    align-items: center;
    gap: 10px;
}

.contact-info i {
    color: #3498db;
    font-size: 20px;
}

.copy-btn {
    background-color: #3498db;
    color: white;
    border: none;
    padding: 8px 15px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    display: flex;
    align-items: center;
    gap: 5px;
}

.copy-btn:hover {
    background-color: #2980b9;
}

.copy-btn i {
    font-size: 14px;
}

.contact-note {
    margin-top: 20px;
    font-style: italic;
    color: #666;
    text-align: center;
}
    </style>
</head>
<body>
    <!-- Your existing content -->
    <a href="#contact" class="btn-about hire">Hire Me</a>
    
    <!-- Contact Modal -->
    <div class="contact-modal" id="contactModal">
        <div class="contact-content">
            <span class="close-modal">&times;</span>
            <h3>Contact Me</h3>
            <p>You can reach me on:</p>
            
            <div class="contact-item">
                <div class="contact-info">
                    <i class="fas fa-phone"></i>
                    <span>+923332332659</span>
                </div>
                <button class="copy-btn" data-clipboard-text="+923332332659">
                    <i class="far fa-copy"></i> Copy
                </button>
            </div>
            
            <div class="contact-item">
                <div class="contact-info">
                    <i class="fas fa-envelope"></i>
                    <span>zaidiashar293@gmail.com</span>
                </div>
                <button class="copy-btn" data-clipboard-text="zaidiashar293@gmail.com">
                    <i class="far fa-copy"></i> Copy
                </button>
            </div>
            
            <p class="contact-note">You can contact me on both WhatsApp and Gmail</p>
        </div>
    </div>

    <script>
        // Contact Modal Functionality
document.addEventListener('DOMContentLoaded', function() {
    const hireBtn = document.querySelector('.hire');
    const contactModal = document.getElementById('contactModal');
    const closeModal = document.querySelector('.close-modal');
    
    // Show modal when Hire Me button is clicked
    hireBtn.addEventListener('click', function(e) {
        e.preventDefault();
        contactModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    });
    
    // Close modal when X is clicked
    closeModal.addEventListener('click', function() {
        contactModal.style.display = 'none';
        document.body.style.overflow = 'auto';
    });
    
    // Close modal when clicking outside the content
    contactModal.addEventListener('click', function(e) {
        if (e.target === contactModal) {
            contactModal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    });
    
    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && contactModal.style.display === 'flex') {
            contactModal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    });
    
    // Initialize clipboard.js
    new ClipboardJS('.copy-btn');
    
    // Add feedback when copying
    const copyButtons = document.querySelectorAll('.copy-btn');
    copyButtons.forEach(button => {
        button.addEventListener('click', function() {
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-check"></i> Copied!';
            button.style.backgroundColor = '#2ecc71';
            
            setTimeout(() => {
                button.innerHTML = originalText;
                button.style.backgroundColor = '#3498db';
            }, 2000);
        });
    });
});
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
</body>
</html>