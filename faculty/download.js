document.getElementById('downloadBtn').addEventListener('click', function() {
    const tableHTML = document.getElementById('TABLE').outerHTML;

    fetch('/faculty/generatePDF_BE.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `tableHTML=${encodeURIComponent(tableHTML)}`,
    })
    .then(response => response.blob())
    .then(blob => {
        // Create a URL for the blob
        const url = window.URL.createObjectURL(blob);
        // Create a new anchor element
        const a = document.createElement('a');
        a.href = url;
        a.download = 'faculty_list.pdf';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        window.URL.revokeObjectURL(url);
    })
    .catch(error => console.error('Error:', error));
});
