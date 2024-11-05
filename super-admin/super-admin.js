// for modals 
const exampleModal = document.getElementById('exampleModal1')
if (exampleModal) {
    exampleModal.addEventListener('show.bs.modal', event => {
        // Button that triggered the modal
        const button = event.relatedTarget
        // Extract info from data-bs-* attributes
        const recipient = button.getAttribute('data-bs-whatever')
        // If necessary, you could initiate an Ajax request here
        // and then do the updating in a callback.

        // Update the modal's content.
        const modalTitle = exampleModal.querySelector('.modal-title')
        const modalBodyInput = exampleModal.querySelector('.modal-body input')

        modalTitle.textContent = `New message to ${recipient}`
        modalBodyInput.value = recipient
    })
}

/*-- JS for Alert button in create-admin.php --*/
const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
const appendAlert = (message, type) => {
    const wrapper = document.createElement('div')
    wrapper.innerHTML = [
        `<div class="alert alert-${type} alert-dismissible" role="alert">`,
        `   <div>${message}</div>`,
        '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
        '</div>'
    ].join('')

    alertPlaceholder.append(wrapper)
}

const alertTrigger = document.getElementById('liveAlertBtn')
if (alertTrigger) {
    alertTrigger.addEventListener('click', () => {
        appendAlert('You have successfully created an account!', 'success')
    })
}

/* JS for posting */
let header = document.querySelector('.header');

document.querySelector('#menu-btn').onclick = () =>{
    header.classList.toggle('active');
}

window.onscroll = () =>{
    header.classList.remove('active');
}

document.querySelectorAll('.posts-content').forEach(content => {
    if(content.innerHTML.length > 100) content.innerHTML = content.innerHTML.slice(0, 100);
});

/* JS - Sidebar highlight */
document.addEventListener("DOMContentLoaded", function() {
  // Select all sidebar menu items
  const menuItems = document.querySelectorAll(".menu-item");

  // Add click event listener to each menu item
  menuItems.forEach(item => {
    item.addEventListener("click", function() {
      // Remove 'active' class from all menu items
      menuItems.forEach(i => i.classList.remove("active"));
      
      // Add 'active' class to the clicked menu item
      item.classList.add("active");
    });
  });
});