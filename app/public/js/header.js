// Make the navigation dropdown menu appear
$(document).ready(function(){
    $('.dropdown-toggle, #userDropdown').click(function(){
        $(this).siblings('.dropdown-menu').toggle(); // Activate the Dropdown menu of the clicked element
    });
});