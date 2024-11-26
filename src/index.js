
const termsLink = document.getElementById('terms-link');
const dialog = document.getElementById('terms-dialog');
const closeDialog = document.getElementById('close-dialog');
const policyLink  = document.getElementById('policy-link');
const policydialog = document.getElementById('policy-dialog');
const policycloseDialog = document.getElementById('policy-close-dialog');
termsLink.addEventListener('click', (event) => {
  event.preventDefault(); 
  dialog.showModal(); 
});
closeDialog.addEventListener('click', () => {
  dialog.close(); 
});

policyLink.addEventListener('click', (event) => {
    event.preventDefault(); 
    policydialog.showModal(); 
  });
  
  policycloseDialog.addEventListener('click', () => {
    policydialog.close(); 
  });
  
    function handleFormSubmission(event) {
        event.preventDefault(); 
      
        const firstNameInput = document.getElementById("FirstName");
        const emailInput = document.getElementById("Email");
        const phoneInput = document.getElementById("Phone"); 
        const firstName = firstNameInput.value;
        const email = emailInput.value;
        const phone = phoneInput.value;
        alert(`Name: ${firstName}, Email: ${email}, Phone: ${phone}`);
}
