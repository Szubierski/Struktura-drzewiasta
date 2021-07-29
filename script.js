function menuToggle() {
    const burgerMenu = document.querySelector('#menuToggle');
    const menu = document.querySelector('#admin');
    const tree = document.querySelector('#tree');
    
    burgerMenu.addEventListener('click', () => {
        if(menu.style.display == 'block') {
            menu.style.display = 'none';
            burgerMenu.textContent = 'menu';
            burgerMenu.classList.remove('open');
            burgerMenu.classList.add('close');
            tree.style.width = '100%';
        }
        else {
            menu.style.display = 'block';
            burgerMenu.textContent = 'close';
            burgerMenu.classList.remove('close');
            burgerMenu.classList.add('open');
            tree.style.width = '85%';
        }
    });
}

function treeToggle() {
    const toggle = document.querySelector('#button');
    
    toggle.addEventListener('click', () => {
        let iframe = document.getElementById('iframe');
        let span = iframe.contentWindow.document.querySelector('#ol_0 li span');
        let listEl = iframe.contentWindow.document.querySelectorAll('li.toggle ol');
        
        if(toggle.textContent == 'Rozwiń') {
            toggle.textContent = 'Zwiń';
            span.textContent = 'folder_open';
            listEl.forEach(el => {
                el.classList.remove('hidden');
                let el2 = el.querySelectorAll('span');
                el2.forEach(el3 => {
                    el3.innerHTML = "folder_open";
                })
            });
        }
        else {
            toggle.textContent = 'Rozwiń';
            span.textContent = 'folder';
            listEl.forEach(el => {
                el.classList.add('hidden');
                let el2 = el.querySelectorAll('span');
                el2.forEach(el3 => {
                    el3.innerHTML = "folder";
                })
            });
        }
    });
}

function validate() {
    const btn1 = document.querySelector('#newNodeForm .btn');
    const btn2 = document.querySelector('#nodeEditForm .btn');
    const btn3 = document.querySelector('#nodeDelForm .btn');
    let newNodeName = document.querySelector('#newNode');
    let nodeParent = document.querySelector('#NodeParent');
    let nodeName = document.querySelector('#nodeName');
    let nodeEdit = document.querySelector('#nodeEdit');
    let newNodeParent = document.querySelector('#newNodeParent');
    let nodeDel = document.querySelector('#nodeDel');
    
    btn1.addEventListener('click', (event) => {
        if(newNodeName.value.length == 0) {
            newNodeName.style.border = "2px solid red";
            event.preventDefault();
        }
        else if(nodeParent.value == 0) {
            nodeParent.style.border = "2px solid red";
            event.preventDefault();
        }
        else {
            newNodeName.style.border = "2px solid rgb(0, 81, 255)";
            nodeParent.style.border = "2px solid rgb(0, 81, 255)";
        }
    });

    btn2.addEventListener('click', (event) => {
        
        if(nodeName.value == 0) {
            nodeName.style.border = "2px solid red";
            event.preventDefault();
        }
        else if(newNodeParent.value == 0) {
            newNodeParent.style.border = "2px solid red";
        }
        else {
            nodeName.style.border = "2px solid rgb(0, 81, 255)";
            nodeEdit.style.border = "2px solid rgb(0, 81, 255)";
            newNodeParent.style.border = "2px solid rgb(0, 81, 255)";
        }
    });

    btn3.addEventListener('click', (event) => {

        if(nodeDel.value == 0) {
            nodeDel.style.border = "2px solid red";
            event.preventDefault();
        }
        else {
            nodeDel.style.border = "2px solid rgb(0, 81, 255)";
        }
    });
}
