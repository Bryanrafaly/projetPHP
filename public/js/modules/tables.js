export function initTables() {
    const tables = document.querySelectorAll("table");
    tables.forEach(table => {
        table.querySelectorAll("tbody tr").forEach(row => {
            row.addEventListener("mouseenter", () => {
                row.style.transform = "scale(1.01)";
                row.style.transition = "all 0.2s ease";
            });
            row.addEventListener("mouseleave", () => {
                row.style.transform = "scale(1)";
            });
        });
    });
}
