document.addEventListener("DOMContentLoaded", function () {
	const toggleBtn = document.getElementById("toggle");
	const nav = document.querySelector(".nav");
	if (toggleBtn && nav) {
		toggleBtn.addEventListener("click", () => {
			nav.classList.toggle("active");
		});

		console.log(nav);
	} else {
		console.error("Elemen tidak ditemukan.");
	}
});
