<script>
    const form = document.querySelector("form");
    const formResponse = document.getElementById("formResponse");
    
    if (form && formResponse) {
        form.addEventListener("submit", function (event) {
            event.preventDefault();
            const formData = new FormData(this);

            fetch("submit_form.php", {
                method: "POST",
                body: formData,
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(HTTP error! Status: ${response.status});
                }
                return response.text();
            })
            .then(data => {
                formResponse.classList.remove("hidden");
                formResponse.innerText = data;
            })
            .catch(error => {
                console.error("Error:", error);
                formResponse.classList.remove("hidden");
                formResponse.innerText = "Something went wrong. Please try again.";
            });
        });
        }
</script>
