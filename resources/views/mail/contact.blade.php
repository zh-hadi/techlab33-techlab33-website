<!-- resources/views/contact.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .contact-box {
            background-color: #f8f8f8;
            padding: 15px;
            border: 1px solid #ddd;
            max-width: 600px;
            margin: 0 auto;
        }
        .contact-box h2 {
            margin-bottom: 10px;
        }
        .contact-box p {
            margin: 5px 0;
        }
        .label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="contact-box">
        <h2>Contact Message</h2>
        <p><span class="label">Name:</span> {{ $data['name'] ?? 'N/A' }}</p>
        <p><span class="label">Email:</span> {{ $data['email'] ?? 'N/A' }}</p>
        <p><span class="label">Subject:</span> {{ $data['subject'] ?? 'N/A' }}</p>
        <p><span class="label">Message:</span></p>
        <p>{{ $data['message'] ?? 'N/A' }}</p>
    </div>
</body>
</html>
