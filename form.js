document.getElementById('contactForm').addEventListener('submit', async (event) => {
    event.preventDefault(); // Prevent the default form submission behavior

    const formData = {
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        message: document.getElementById('message').value,
    };

    try {
        const response = await fetch('https://your-backend-url.com/send-email', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(formData),
        });

        const result = await response.json();
        document.getElementById('status').innerText = result.message || 'Message sent successfully!';
    } catch (error) {
        document.getElementById('status').innerText = 'Error sending message. Please try again later.';
        console.error(error);
    }
});
