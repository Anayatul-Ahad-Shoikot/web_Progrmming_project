
    function openModal() {
        document.getElementById('myModal').style.display = 'block';
        document.getElementById('overlay').style.display = 'block';
    }
    function closeModal() {
        document.getElementById('myModal').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }

    // Functions for different actions (Edit, Delete, View)
    function editAction() {
        // Implement your edit action logic here
        alert('Edit action triggered');
        closeModal();
    }

    function deleteAction() {
        // Implement your delete action logic here
        alert('Delete action triggered');
        closeModal();
    }

    function viewAction() {
        // Implement your view action logic here
        alert('View action triggered');
        closeModal();
    }
