const selectOptions = document.getElementById('ruolo');
const newField = document.getElementById('newField');

selectOptions.addEventListener('change', function() {
  if (selectOptions.value === 'Studente') {
    newField.style.display = 'block';
  } else if (selectOptions.value === 'Esercente') {
    newField.style.display = 'block';
  } else if (selectOptions.value === 'Referente') {
    newField.style.display = 'block';
  }
});