 
document.addEventListener('DOMContentLoaded', () => {
    const tableBody = document.getElementById('tableBody');
    const pagination = document.getElementById('pagination');
    const searchInput = document.getElementById('searchInput');
    const dateFilter = document.getElementById('dateFilter');
    const modalTableBody = document.getElementById('modalTableBody');
    const printButton = document.getElementById('printTable');
    const downloadPDFButton = document.getElementById('downloadPDF');

    const data = [
        // Example data
        { datetime: '2024-06-27 14:00', drawNumbers: '1, 2, 3, 4, 5, 6', winners: 'Winner 1', details: [{ ticket: '123', phone: '555-1234', picked: '1, 2, 3', stake: '$5', winnings: '$50' }] },
        { datetime: '2024-06-27 15:00', drawNumbers: '2, 3, 4, 5, 6, 7', winners: 'Winner 2', details: [{ ticket: '124', phone: '555-5678', picked: '2, 3, 4', stake: '$10', winnings: '$100' }] },
        { datetime: '2024-06-28 10:00', drawNumbers: '3, 4, 5, 6, 7, 8', winners: 'Winner 3', details: [{ ticket: '125', phone: '555-7890', picked: '3, 4, 5', stake: '$15', winnings: '$150' }] },
        { datetime: '2024-06-28 11:00', drawNumbers: '4, 5, 6, 7, 8, 9', winners: 'Winner 4', details: [{ ticket: '126', phone: '555-2468', picked: '4, 5, 6', stake: '$20', winnings: '$200' }] },
        { datetime: '2024-06-29 14:00', drawNumbers: '5, 6, 7, 8, 9, 10', winners: 'Winner 5', details: [{ ticket: '127', phone: '555-1357', picked: '5, 6, 7', stake: '$25', winnings: '$250' }] },
        // Add more rows as needed
    ];

    let currentPage = 1;
    const rowsPerPage = 10;

    function displayTable(data, page = 1) {
        const start = (page - 1) * rowsPerPage;
        const end = page * rowsPerPage;
        const paginatedItems = data.slice(start, end);

        tableBody.innerHTML = '';
        paginatedItems.forEach((item, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${start + index + 1}</td>
                <td>${item.datetime}</td>
                <td>${item.drawNumbers}</td>
                <td><button class="btn btn-link" data-toggle="modal" data-target="#winnerModal" data-details='${JSON.stringify(item.details)}'>${item.winners}</button></td>
            `;
            tableBody.appendChild(row);
        });

        displayPagination(data.length);
    }

    function displayPagination(totalItems) {
        const totalPages = Math.ceil(totalItems / rowsPerPage);
        pagination.innerHTML = '';

        for (let i = 1; i <= totalPages; i++) {
            const li = document.createElement('li');
            li.className = `page-item ${i === currentPage ? 'active' : ''}`;
            li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
            li.addEventListener('click', (e) => {
                e.preventDefault();
                currentPage = i;
                displayTable(data, currentPage);
            });
            pagination.appendChild(li);
        }
    }

    searchInput.addEventListener('input', (e) => {
        const searchTerm = e.target.value.toLowerCase();
        const filteredData = data.filter(item => 
            item.datetime.toLowerCase().includes(searchTerm) ||
            item.drawNumbers.toLowerCase().includes(searchTerm) ||
            item.winners.toLowerCase().includes(searchTerm)
        );
        displayTable(filteredData, 1);
    });

    dateFilter.addEventListener('change', (e) => {
        const selectedDate = e.target.value;
        const filteredData = data.filter(item => item.datetime.startsWith(selectedDate));
        displayTable(filteredData, 1);
    });

    $('#winnerModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget);
        const details = button.data('details');
        
        modalTableBody.innerHTML = '';
        details.forEach(detail => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${detail.ticket}</td>
                <td>${detail.phone}</td>
                <td>${detail.picked}</td>
                <td>${detail.stake}</td>
                <td>${detail.winnings}</td>
            `;
            modalTableBody.appendChild(row);
        });
    });

    printButton.addEventListener('click', () => {
        window.print();
    });

    downloadPDFButton.addEventListener('click', () => {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        doc.autoTable({ html: 'table' });
        doc.save('table.pdf');
    });

    $('#dateFilter').datetimepicker({
        format: 'Y-m-d H:i',
        timepicker: true,
        datepicker: true,
    });

    displayTable(data);
});


 