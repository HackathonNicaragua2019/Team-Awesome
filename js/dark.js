function $(el){
    return document.querySelector(el);
}

let container = $('.container1');
let toogle = $('toogle-theme');

toogle.addEventListener('.click', () =>{
    let list = container.classList;

    if(list.contains('default')){
        list.replace('default', 'dark');
        toogle.textContent = 'Light';
    }
    else{
        list.replace('dark', 'default');
        toogle.textContent = 'Dark';
    }
})