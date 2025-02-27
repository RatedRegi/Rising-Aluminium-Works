    document.getElementById("toggleButton").addEventListener("click", function () {
        let collapseElement = document.getElementById("collapseOne");
        let bsCollapse = new bootstrap.Collapse(collapseElement, { toggle: false });

        if (collapseElement.classList.contains("show")) {
            bsCollapse.hide();
        } else {
            bsCollapse.show();
        }
    });
