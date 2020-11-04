const sidebarLinks = document.querySelectorAll('.sidebar .nav-link')



Array.from(sidebarLinks).forEach(item => {
    const url = window.location.protocol + '//' + window.location.host + window.location.pathname
    const link = item.getAttribute('href')
    if (url === link){
        item.classList.add('active')
        if (item.closest('ul').classList.contains('nav-treeview')){

        }
    }
})









