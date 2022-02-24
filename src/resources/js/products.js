let searchParams = new URLSearchParams(window.location.search);

function debounce(func, timeout = 0) {
    let timer;
    return (...args) => {
        clearTimeout(timer);
        timer = setTimeout(() => {
            func.apply(this, args);
        }, timeout);
    };
}

const urlRedirectDebounce = debounce(() => {
    window.location.href = "/products?" + decodeURI(searchParams.toString());
});

function padarykKazkaIsDvieju(kazkaFunkcija) {
    return kazkaFunkcija(...args);
}

document
    .querySelector("#productFilter")
    .addEventListener("change", function () {
        searchParams.set(
            "order_by",
            document.getElementById("productFilter").value
        );
        urlRedirectDebounce();
    });

document.querySelector("#customRange").addEventListener("change", function () {
    searchParams.set("rating", document.querySelector("#customRange").value);
    urlRedirectDebounce();
});

const radioSelects = document.querySelectorAll(
    'input[name="flexRadioDefault"]'
);

for (let i = 0; i < radioSelects.length; i++) {
    radioSelects[i].addEventListener("click", function () {
        searchParams.set(
            "price",
            document.querySelector('input[name="flexRadioDefault"]:checked')
                .value
        );
        urlRedirectDebounce();
    });
}

document
    .getElementById("productCategory")
    .addEventListener("click", function (e) {
        if (e.target && e.target.matches("li.categoryItem")) {
            e.target.className = "foo"; // new class name here
            alert("clicked " + e.target.innerText);
        }
    });
