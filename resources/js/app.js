const container = document.getElementById('container');
    const overlayCon = document.getElementById('overlayCon');
    const overlayBtn = document.querySelector('.overlayBtn');

    overlayBtn.addEventListener('click', () => {
        container.classList.remove('right-panel-active');
    });