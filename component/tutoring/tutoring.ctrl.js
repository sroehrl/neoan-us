let existing = document.querySelector('#existing-student');

existing.addEventListener('submit', ev => {
    ev.preventDefault();
    alert('Not valid');
});