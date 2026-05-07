
const s = document.getElementById("searchBox");
const rows = document.querySelectorAll("tbody tr");
const noData = document.getElementById("noData");

// Live search
s.onkeyup = () => {
    let v = s.value.toLowerCase();
    let visible = 0;

    rows.forEach(r => {
        let show = r.innerText.toLowerCase().includes(v);
        r.style.display = show ? "" : "none";
        if (show) visible++;
    });

    noData.style.display = visible ? "none" : "block";
};

// Keyboard shortcuts
document.onkeydown = e => {
    if (e.key === "/") {
        e.preventDefault();
        s.focus();
    }

    if (e.key === "Escape") {
        s.value = "";
        s.blur();
        rows.forEach(r => r.style.display = "");
        noData.style.display = "none";
    }
};