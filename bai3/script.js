fetch("65HTTT_Danh_sach_diem_danh.csv")
  .then((response) => response.text())
  .then((data) => {
    const rows = data.split(/\r?\n/);
    const table = document.createElement("table");
    const tableContainer = document.getElementById("table-container");

    rows.forEach((row, index) => {
      const tr = document.createElement("tr");
      const cols = row.split(",");

      cols.forEach((col) => {
        const cell = document.createElement(index === 0 ? "th" : "td");
        cell.textContent = col;
        tr.appendChild(cell);
      });

      table.appendChild(tr);
    });

    tableContainer.appendChild(table);
  })
  .catch((err) => console.error(err));
