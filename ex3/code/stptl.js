function validateform(){
    const regno=document.getElementById('regno');
    const name =document.getElementById('name');
    const year=document.getElementById('year');
    const sem=document.getElementById('sem');
    const acyear=document.getElementById('acyear');
    const subcode=document.getElementById('subcode');
    const subname=document.getElementById('subname');
    const credit=document.getElementById('credit');
    const type=document.getElementById('type');

    if(regno.value.trim()===''){
        alert('Please enter your regno');
        name.focus();
        return false;
    }
    const rno=/^\d{9}$/;
    if(!rno.test(regno.value)){
        alert('Please enter a valid register number.');
        regno.focus;
        return false;
    }

    if(name.value.trim()===''){
        alert('Please enter your name');
        name.focus();
        return false;
    }
    if(year.selectedIndex===0){
        alert('Please select a year');
        year.focus();
        return false;
    }
    if(sem.selectedIndex===0){
        alert('Please select a sem');
        sem.focus();
        return false;
    }
    if(acyear.selectedIndex===0){
        alert('Please select a academic year');
        acyear.focus();
        return false;
    }
    if(subcode.value.trim()===''){
        alert('Please enter the subject code');
        subcode.focus();
        return false;
    }
    const sp = /^[A-Za-z]{2}\d{5}$/;
    if(!sp.test(subcode.value)){
        alert('Please enter a valid subject code');
        subcode.focus();
        return false;
    }
    if(subname.value.trim()===''){
        alert('Please enter the subject name');
        subname.focus();
        return false;
    }
    if(credit.value.trim()===''){
        alert('Please enter the credit');
        credit.focus();
        return false;
    }
    if(type.selectedIndex===0){
        alert('Please select the type of the course');
        type.focus();
        return false;
    }
    return true;
}
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
      if (validateform()) {
        // Display success message
        const successMessage = document.getElementById('success-message');
        successMessage.style.display = 'block';
        successMessage.innerHTML = 'Form submitted successfully!';
        // Submit the form
        // You can also use AJAX to submit the form without reloading the page
        // For simplicity, I'm just submitting the form normally
        // If you want to stay on the same page, you can use AJAX
        setTimeout(function() {
          form.submit();
        }, 2000); // Wait for 2 seconds before submitting the form
        event.preventDefault();
      } else {
        event.preventDefault();
      }
    });
});