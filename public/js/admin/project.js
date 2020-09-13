document.body.onload = () => {
    let addProspectBtn = document.getElementById('add-prospect-btn')
    let addProspectModal = document.getElementById('add-project-modal');
    let closeProspectModal = document.getElementsByClassName('close-modal-project');
    let modalStyle = document.getElementsByClassName('modal-style-project');

    addProspectModal.style.display = 'none';

    addProspectBtn.onclick = () => {
        if (addProspectModal.style.display == 'none') {
            addProspectModal.style.display = 'block';
        } else {
            addProspectModal.style.display = 'none';
        }
    }

    for (let i = 0; i < closeProspectModal.length; i++) {
        closeProspectModal[i].onclick = () => {
            for (let x = 0; x < modalStyle.length; x++) {
                modalStyle[x].style.display = 'none';
            }
        }
    }

    /*tail.DateTime("#date", {
        position: "bottom",
        startOpen: true,
        stayOpen: true
    });*/
}