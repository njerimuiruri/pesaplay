<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lottery Results Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Lottery Results</h2>
        <div class="row mb-3">
            <div class="col-md-6">
                <input type="text" id="searchInput" class="form-control" placeholder="Search...">
            </div>
            <div class="col-md-3">
                <input type="text" id="dateRange" class="form-control" placeholder="Select date range">
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary me-2" onclick="printTable()">Print</button>
                <button class="btn btn-secondary" onclick="downloadTable()">Download</button>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>DRAW ID</th>
                    <th>Date & Time</th>
                    <th>Winning Numbers</th>
                    <th>Winners</th>
                </tr>
            </thead>
            <tbody id="lotteryTableBody">
                <!-- Table rows will be dynamically added here -->
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="winnersModal" tabindex="-1" aria-labelledby="winnersModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="winnersModalLabel">Winners</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#NO</th>
                                <th>TICKET ID</th>
                                <th>PHONE NO</th>
                                <th>NUMBER PICKS</th>
                                <th>STAKE</th>
                                <th>WINNINGS</th>
                            </tr>
                        </thead>
                        <tbody id="winnersTableBody">
                            <!-- Winner rows will be dynamically added here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        // Dummy data with more varied entries
        const lotteryData = [
            {
                drawId: "#12345",
                dateTime: "2024-10-10 10:10 am",
                winningNumbers: "12,34,56,78,9,0",
                winners: [
                    { no: 1, ticketId: "#2547", phoneNo: "0711111111", numberPicks: "12,34,56,78,9,0", stake: 200, winnings: 200000 },
                    { no: 2, ticketId: "#2548", phoneNo: "0722222222", numberPicks: "12,34,56,78,9,0", stake: 100, winnings: 100000 }
                ]
            },
            {
                drawId: "#12346",
                dateTime: "2024-10-11 11:15 am",
                winningNumbers: "1,23,45,67,8,9",
                winners: [
                    { no: 1, ticketId: "#2549", phoneNo: "0733333333", numberPicks: "1,23,45,67,8,9", stake: 150, winnings: 150000 }
                ]
            },
            {
                drawId: "#12347",
                dateTime: "2024-10-12 09:30 am",
                winningNumbers: "11,22,33,44,55,66",
                winners: [
                    { no: 1, ticketId: "#2550", phoneNo: "0744444444", numberPicks: "11,22,33,44,55,66", stake: 300, winnings: 300000 },
                    { no: 2, ticketId: "#2551", phoneNo: "0755555555", numberPicks: "11,22,33,44,55,66", stake: 250, winnings: 250000 },
                    { no: 3, ticketId: "#2552", phoneNo: "0766666666", numberPicks: "11,22,33,44,55,66", stake: 200, winnings: 200000 }
                ]
            },
            {
                drawId: "#12348",
                dateTime: "2024-10-13 14:45 pm",
                winningNumbers: "7,14,21,28,35,42",
                winners: []
            },
            {
                drawId: "#12349",
                dateTime: "2024-10-14 16:20 pm",
                winningNumbers: "2,4,6,8,10,12",
                winners: [
                    { no: 1, ticketId: "#2553", phoneNo: "0777777777", numberPicks: "2,4,6,8,10,12", stake: 500, winnings: 1000000 }
                ]
            }
        ];

        function populateTable(data) {
            const tableBody = document.getElementById('lotteryTableBody');
            tableBody.innerHTML = '';
            data.forEach(draw => {
                const row = `
                    <tr>
                        <td>${draw.drawId}</td>
                        <td>${draw.dateTime}</td>
                        <td>${draw.winningNumbers}</td>
                        <td><button class="btn btn-sm btn-info" onclick="showWinners('${draw.drawId}')">View Winners (${draw.winners.length})</button></td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            });
        }

        function showWinners(drawId) {
            const draw = lotteryData.find(d => d.drawId === drawId);
            const winnersBody = document.getElementById('winnersTableBody');
            winnersBody.innerHTML = '';
            draw.winners.forEach(winner => {
                const row = `
                    <tr>
                        <td>${winner.no}</td>
                        <td>${winner.ticketId}</td>
                        <td>${winner.phoneNo}</td>
                        <td>${winner.numberPicks}</td>
                        <td>${winner.stake}</td>
                        <td>${winner.winnings}</td>
                    </tr>
                `;
                winnersBody.innerHTML += row;
            });
            const modal = new bootstrap.Modal(document.getElementById('winnersModal'));
            modal.show();
        }

        function filterTable() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const filteredData = lotteryData.filter(draw => 
                draw.drawId.toLowerCase().includes(searchTerm) ||
                draw.dateTime.toLowerCase().includes(searchTerm) ||
                draw.winningNumbers.includes(searchTerm)
            );
            populateTable(filteredData);
        }

        function printTable() {
            window.print();
        }

        function downloadTable() {
            // Implement download functionality here
            console.log("Download functionality to be implemented");
            alert("Download functionality not yet implemented");
        }

        // Initialize date range picker
        flatpickr("#dateRange", {
            mode: "range",
            dateFormat: "Y-m-d",
            onChange: function(selectedDates, dateStr, instance) {
                if (selectedDates.length === 2) {
                    const [start, end] = selectedDates;
                    const filteredData = lotteryData.filter(draw => {
                        const drawDate = new Date(draw.dateTime);
                        return drawDate >= start && drawDate <= end;
                    });
                    populateTable(filteredData);
                }
            }
        });

        // Initialize table and search functionality
        document.addEventListener('DOMContentLoaded', function() {
            populateTable(lotteryData);
            document.getElementById('searchInput').addEventListener('input', filterTable);
        });
    </script>
</body>
</html>