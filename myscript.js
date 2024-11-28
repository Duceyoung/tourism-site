document.getElementById('ticket-type').addEventListener('change', updateTotalPrice);
document.getElementById('numTickets').addEventListener('input', updateTotalPrice);

document.getElementById('ticketForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const visitDate = document.getElementById('visit_date').value;
    const timeSlot = document.getElementById('timeSlot').value;
    const ticketType = document.getElementById('ticket-type').value;
    const numTickets = parseInt(document.getElementById('numTickets').value);

    const bookingResponse = document.getElementById('bookingResponse');

    if (name && email && visitDate && timeSlot && ticketType && numTickets) {
        const totalPrice = calculateTotalPrice(ticketType, numTickets);

        // Display booking confirmation
        bookingResponse.textContent = 'Thank you! Your tickets has been booked. Total: $${totalPrice}. Confirmation will be sent to your email.';
        bookingResponse.className = 'success';
        bookingResponse.classList.remove('hidden');

        //Clear the form fields
        document.getElementById('ticketForm').reset();
        updateTotalPrice(); //Reset total price display
    }else {
        bookingResponse.textContent = 'Please fill in all fields before submitting.';
        bookingResponse.className = 'error';
        bookingResponse.classList.remove('hidden');
    }
});

// function to update the total price dynamically
function updateTotalPrice() {
    const ticketType = document.getElementById('ticket-type').value;
    const numTickets = parseInt(document.getElementById('numTickets').value) || 1;
    const totalPrice = calculateTotalPrice(ticketType, numTickets);

    document.getElementById('totalPrice').textContent = `Total Price: $${totalPrice}`;
}

// function to calculate the total price
function calculateTotalPrice(ticketType, numTickets) {
    let ticketPrice = 0;
    switch (ticketType) {
        case 'adult' :
            ticketPrice = 20;
            break;
        case 'child':
            ticketPrice = 10;
            break;
        case 'senior':
            ticketPrice= 15;
            break;
    }
    return ticketPrice * numTickets;
}

// Initialize total price display
updateTotalPrice();
