const main = document.querySelector(".main");
const menuBtn = document.querySelector(".hum_menu button");
const sideBar = document.querySelector(".sidebar");
const registerForm = document.querySelector(".registration_form form");
menuBtn.addEventListener('click', () => {
    sideBar.classList.toggle("active");
    main.classList.toggle("active");
    //registerForm.classList.toggle("active");
}) 

const sideLists = document.querySelectorAll(".sidebar ul li");
links = ['index.php', 'register.php', 'manage.php', 'profile.php', 'setting.php', 'logout.php'];
sideLists.forEach((list, index) => {
    list.addEventListener('click', () => {
        for(let i=0; i<sideLists.length; i++){
            sideLists[i].classList.remove("active");
        }
        list.classList.add("active");
        window.location = links[index];
    })
}); 

const removePop = document.querySelector(".pop_up .remove");
removePop.onclick = function(){
    removePop.parentElement.style.display = "none";
    
}
setTimeout(() => {
    removePop.click();
}, 3000);