let nama = "nur ridha salsabila";
var name = "hei jangan lanjyut!";
const fullname = "nur ridha salsabila";
// const : tetap tidak boleh merubah nilai
// document.write ()
// console.log({"nama": name, "fullname": fullname});
// alert(name);

let angka1 = 10;
let angka2 = 20;
console.log(angka1 + angka2);
console.log(angka1 - angka2);
console.log(angka1 / angka2);
console.log(angka1 * angka2);
console.log(angka1 % angka2);
console.log(angka1 ** angka2);

//operator penugasan
let x = 10;
x += 5; //15
console.log(x);

//operator pembandingan
// >,<,=, ==,===,!==
let a = 1;
let b = 1;
if (a === b) {
    console.log("ya");
} else {
    console.log(tidak);
}

console.log(a > b);
console.log(a < b);

//operator logika
//&&, AND, OR, ||, !: tidak/not
let umur = 20;
let punyaSim = true;
if (umur >= 17 && punyaSim) {
    console.log("boleh mengemudi");
} else {
    console.log("tidak boleh mengemudi");
}

//array: sebuah tipe data yang bisa memiliki nilai lebih dari satu (1)
let buah = ["pisang", "salak", "semangka"];
//      0          1         2
console.log("buah di keranjang:", buah);
console.log("saya mau buah:", buah[1]);
buah[1] = "nanas";
console.log("buah baru:", buah);
buah.push("pepaya");
console.log("buah", buah);
buah.push("jeruk");
console.log("buah", buah);
buah.pop();
console.log("buah", buah);

// document.querySelector("#product-title")
document.getElementById("product-title").innerHTML = "<p>Data Product Baru</p>";
// document.getElementsByClassName('category-btn');
let btn = document.getElementsByClassName("category-btn");
// btn[0].style.color = "black";
// btn[1].style.color = "black";
// btn[2].style.color = "black";
// btn[3].style.color = "black";
console.log("ini button", btn);
let buttons = document.querySelectorAll(".category-btn");
// buttons.forEach(function(btn) {});
buttons.forEach((btn) => {
    btn.style.color = "black";
    console.log(btn);
});

// let card = document.getElementById('card');
// let h3 = document.createElement("h3");
// let textH3 = document.createTextNode("Selamat Datang");
// h3.textContent = "Selamat Datang dengan textcontent";
// let p = document.createElement('p');
// p.innerText = "ETTT";
// p.textContent = "eh eh eh";
// //nambahin element didalam card
// card.appendChild(h3);
// card.appendChild(p);

// foreach($buttons as $btn){}
//"id" hanya 1,"classs" sifatnya banyak

let currentCategory = "all";

function filterCategory(category, event) {
    currentCategory = category;

    let buttons = document.querySelectorAll(".category-btn");
    buttons.forEach((btn) => {
    btn.classList.remove('active');
    btn.classList.remove('btn-warning');
    btn.classList.add("btn-outline-warning") ;   
});
event.classList.add("active");
event.classList.remove("btn-outline-warning");
event.classList.add("btn-warning");
console.log({currentCategory: currentCategory, category: category, event: event});


renderProducts();
}

function renderProducts(searchProduct = ""){
    const productGrid = document.getElementById("productGrid");
    productGrid.innerHTML = "";

    //filter
    const filtered = products.filter((product) =>{
        //shorthand/ ternery
        const matchCategory = currentCategory === "all" || product.category_name === currentCategory;
        const matchSearch = product.product_name.toLowerCase().includes(searchProduct);
        return matchCategory && matchSearch;
    });

    //munculin data dari table products
    filtered.forEach((product)=> {
        const col = document.createElement('div');
        col.className = "col-md-3 col-sm-6 mb-4";
        col.innerHTML = 
        `<div class="card product-card">
        <div class="product-img">
            <img src="../${product.product_photo}" alt="" width="100%">
        </div>
        <div class="card-body">
            <span class="badge bg-secondary badge-category">${product.category_name}</span>
            <h6 class="card-title mt-2 mb-2">${product.product_name}</h6>
            <p class="card-text text-primary fw-bold">Rp.${product.product_price}.-</p>
        </div>
        </div>`;
        productGrid.appendChild(col);
    });

    console.log(products);
}
//useEffect(() =>{
//}. [])
// DomContentLoaded : akan meload funcion pertama kali 
renderProducts();

document.getElementById("searchProduct").addEventListener("input", function (e) {
    const searchProduct = e.target.value.toLowerCase();
    renderProducts(searchProduct);
});