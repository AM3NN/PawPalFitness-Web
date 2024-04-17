// Fetch reservations data from the server
fetch('/reservation')
    .then(response => response.json())
    .then(data => {
        // Get the table body element
        const tableBody = document.querySelector('.planning-table tbody');

        // Clear existing table rows
        tableBody.innerHTML = '';

        // Iterate over the fetched data and create table rows
        data.forEach(reservation => {
            const row = `
                <tr>
                    <td>${reservation.date}</td>
                    <td>${reservation.places}</td>
                    <td>${reservation.category}</td>
                    <!-- Add more table cells for other course details -->
                </tr>
            `;
            tableBody.innerHTML += row;
        });
    })
    .catch(error => {
        console.error('Error fetching reservations:', error);
    });