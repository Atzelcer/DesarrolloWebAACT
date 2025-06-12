
function initSearch() {
  const searchbar      = document.getElementById("searchbar");
  const resultsDiv     = document.querySelector(".results");
  const modal          = document.getElementById("bookModal");
  const closeBtn       = modal.querySelector(".close");
  const modalImage     = document.getElementById("modalImage");
  const modalTitle     = document.getElementById("modalTitle");
  const modalAuthor    = document.getElementById("modalAuthor");
  const modalEditorial = document.getElementById("modalEditorial");
  const modalYear      = document.getElementById("modalYear");
  const modalCareer    = document.getElementById("modalCareer");

  async function doSearch(openModal = false) {
    const q = searchbar.value.trim();
    if (!q) {
      resultsDiv.style.display = "none";
      resultsDiv.innerHTML = "";
      return;
    }


    const resp = await fetch(`search.php?prompt=${encodeURIComponent(q)}`);
    if (!resp.ok) return;
    const books = await resp.json();


    resultsDiv.innerHTML = "";
    books.forEach(book => {
      const div = document.createElement("div");
      div.className = "result";
      div.textContent = book.title;
      div.addEventListener("click", () => showModal(book));
      resultsDiv.appendChild(div);
    });
    resultsDiv.style.display = books.length ? "block" : "none";

 
    if (openModal && books.length) {
      showModal(books[0]);
    }
  }


  function showModal(book) {
    modalImage.src        = `img/${book.image}`;
    modalTitle.textContent     = book.title;
    modalAuthor.textContent    = book.author;
    modalEditorial.textContent = book.editorial;
    modalYear.textContent      = book.year;
    // si no hay carrera, mostramos el ID
    modalCareer.textContent    = book.career || `ID ${book.career_id}`;
    modal.style.display        = "block";
  }


  searchbar.addEventListener("input", () => doSearch(false));
  searchbar.addEventListener("keydown", e => {
    if (e.key === "Enter") {
      e.preventDefault();
      doSearch(true);
    }
  });

  closeBtn.addEventListener("click", () => (modal.style.display = "none"));
  window.addEventListener("click", e => {
    if (e.target === modal) modal.style.display = "none";
  });
}

document.addEventListener("DOMContentLoaded", initSearch);
