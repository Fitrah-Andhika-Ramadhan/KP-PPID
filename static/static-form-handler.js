function handleFormSubmission(event) {
    event.preventDefault();
    
    const form = event.target;
    const formAction = form.getAttribute('data-original-action');
    const formData = new FormData(form);
    
    // In a static site, we can't actually submit the form to a server
    // So we'll just show a message instead
    alert('This is a static version of the website. Form submissions are not processed.\n\nIn the live version, this form would be submitted to: ' + formAction);
    
    // Clear the form
    form.reset();
    
    return false;
}

// Add event listeners to all forms
document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', handleFormSubmission);
    });
});