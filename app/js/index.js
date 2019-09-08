function searchByName() {
    let input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search-input");
    filter = input.value.toUpperCase();
    table = document.getElementById("main-table");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

$(document).on('click', '#delete-row', function () {
    let id = $(this).data('id');
    let href = $('*[data-id="' + id + '"]');

    console.log(href);

    if (confirm('Are you sure you want to remove this record?')) {
        $.ajax({
            url: "/",
            method: "POST",
            dataType: "json",
            data: {id: id, action: 'delete-row'},
            success: function (response) {
                    //этот tr как-раз не убирается.
                    href.closest("tr").remove();
            }
        });
    } else {
        return false;
    }
});

function sortTable(tableid, n) {
    let table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;

    table = document.getElementById(tableid);
    console.log(table);
    switching = true;
    dir = "asc";
    while (switching) {
        switching = false;
        rows = table.getElementsByTagName("tr");
        console.log(rows);
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("td")[n];
            y = rows[i + 1].getElementsByTagName("td")[n];
            if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                }
            } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchcount++;
        } else {
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}