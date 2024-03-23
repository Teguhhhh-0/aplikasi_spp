const button = document.getElementById("tambah");
const container = document.querySelector(".container");

button.addEventListener("click", () => {
	container.classList.toggle("show");
});
