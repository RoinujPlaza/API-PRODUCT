const API = "http://localhost/productAPI/api/products";

const list = document.getElementById("list");
const form = document.getElementById("form");

async function load() {
  const res = await fetch(API);
  const data = await res.json();

  list.innerHTML = "";

  data.forEach(p => {
    list.innerHTML += `
      <div class="item">
        ${p.product} - ₱${p.price}
      </div>
    `;
  });
}

form.addEventListener("submit", async (e) => {
  e.preventDefault();

  await fetch(API, {
    method: "POST",
    headers: {"Content-Type": "application/json"},
    body: JSON.stringify({
      product: product.value,
      price: price.value
    })
  });

  load();
});

load();