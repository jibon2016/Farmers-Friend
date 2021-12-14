/*!
    * Start Bootstrap - SB Admin v7.0.4 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2021 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});


[].forEach.call(document.getElementsByClassName('tag-input'), function(el){
    let hiddenInput = document.createElement('input'),
        mainInput = document.createElement('input'),
        tags = [];

    let editValue = document.querySelector("#edit").value;
     

        hiddenInput.setAttribute('type','hidden');
        hiddenInput.setAttribute('name', el.getAttribute('data-name'));

        mainInput.classList.add('main-input');
        mainInput.setAttribute('type', 'text');
        mainInput.setAttribute('placeholder', 'Tags');
        mainInput.addEventListener('input', function(){
            let enteredTags = mainInput.value.split(',');
            if (enteredTags.length > 1){
                enteredTags.forEach(function(t){
                    let filteredTag = filterTag(t);
                    if(filteredTag.length > 0)
                        addTag(filteredTag);
                });
                mainInput.value = '';
            }
        });
        mainInput.addEventListener('keydown', function(e){
            let keyCode = e.which || e.keyCode;
            if (keyCode === 8 && mainInput.value.length === 0 && tags.length > 0) {
                removeTag(tags.length -1);
            }
        });

        el.appendChild(mainInput);
        el.appendChild(hiddenInput);

        if(document.getElementById("myid").classList.contains("edit")){
            let editArr = editValue.split(',');
            editArr.forEach(function(t){
                addTag(t);
            });
        }

        function addTag(text){
            let tag ={
                text: text,
                element: document.createElement('span')
            }
            tag.element.classList.add('tag');
            tag.element.textContent = tag.text;

            let closeBtn = document.createElement('span');
            closeBtn.classList.add('close');
            closeBtn.addEventListener('click', function(){
                removeTag(tags.indexOf(tag));
            });
            tag.element.appendChild(closeBtn);

            tags.push(tag);
            el.insertBefore(tag.element, mainInput);
            refreshTags();
        }

        function removeTag(index){
            let tag = tags[index];
            tags.splice(index, 1);
            el.removeChild(tag.element);
            refreshTags();
        }

        function refreshTags(){
            let tagList = [];
            tags.forEach(function(t){
                tagList.push(t.text);
            });
            hiddenInput.value = tagList.join(',');
        }

        function filterTag(tag){
            return tag.replace(/[^\w -]/g, '').trim().replace(/\W+/g, '-');
        }
});