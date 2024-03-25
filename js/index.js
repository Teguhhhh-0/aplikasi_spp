document.addEventListener("DOMContentLoaded", function () {
	const buttonTambah = document.getElementById("buttonTambah");
	const container = document.querySelector(".container");

	if (buttonTambah && container) {
		buttonTambah.addEventListener("click", () => {
			container.classList.toggle("show");
		});
	} else {
		console.error("Elemen tidak ditemukan.");
	}
});


