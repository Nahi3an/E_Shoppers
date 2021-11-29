document.body.addEventListener("click", function (e) {
  let itemNum = document.getElementById("cart-item-number").innerHTML;
  if (e.target.classList.contains("add-to-cart")) {
    let num = parseInt(itemNum);

    num = num + 1;

    document.getElementById("cart-item-number").innerHTML = num;
  }
});
