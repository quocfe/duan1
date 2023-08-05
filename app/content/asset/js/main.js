function toggleSearchForm() {
  const overlay = document.getElementById("overlay");
  overlay.style.display = overlay.style.display === "block" ? "none" : "block";
}

if (document.querySelector(".product")) {
  const product = document.querySelector(".product");
  const previousBtn = product.querySelector(".btn-previous");
  const nextBtn = product.querySelector(".btn-next");
  const itemRow = product.querySelector(".item_row");
  const item = product.querySelector(".item");

  let transform = 0;
  const itemWidth = item?.offsetWidth;
  const maxTransform = (itemRow?.scrollWidth - itemRow?.offsetWidth) * -1;

  previousBtn?.addEventListener("click", () => {
    transform += itemWidth;
    if (transform > 0) {
      transform = maxTransform;
    }
    itemRow.style.transform = `translateX(${transform}px)`; // Điều chỉnh giá trị theo ý muốn
  });

  nextBtn?.addEventListener("click", () => {
    transform -= itemWidth;

    if (transform < maxTransform) {
      transform = 0;
    }
    itemRow.style.transform = `translateX(${transform}px)`;
  });
}

if (document.querySelector(".community")) {
  const community = document.querySelector(".community");
  const previousBtn = community.querySelector(".btn-previous");
  const nextBtn = community.querySelector(".btn-next");
  const itemRow = community.querySelector(".item_row");
  const item = community.querySelector(".item");

  let transform = 0;
  const itemWidth = item.offsetWidth;
  const maxTransform = (itemRow.scrollWidth - itemRow.offsetWidth) * -1;

  previousBtn.addEventListener("click", () => {
    transform += itemWidth + 20;
    if (transform > 0) {
      transform = maxTransform;
    }
    itemRow.style.transform = `translateX(${transform}px)`; // Điều chỉnh giá trị theo ý muốn
  });

  nextBtn.addEventListener("click", () => {
    transform -= itemWidth + 20;

    if (transform < maxTransform) {
      transform = 0;
    }
    itemRow.style.transform = `translateX(${transform}px)`;
  });
}

if (document.querySelector(".main_store")) {
  const loadMoreBtn = document.querySelector(".see_more-btn");
  let currentItem = 8;
  loadMoreBtn.addEventListener("click", (e) => {
    const btn = e.currentTarget;
    const elementList = [...document.querySelectorAll(".item")];
    btn.classList.add("loading");

    for (let i = currentItem; i < currentItem + 4; i++) {
      setTimeout(function () {
        btn.classList.remove("loading");
        if (elementList[i]) {
          elementList[i].style.display = "block";
        }
      }, 1000);
    }
    currentItem += 4;

    if (currentItem >= elementList.length) {
      btn.classList.add("loaded");
    }
  });
}

if (document.querySelector(".product_shop_list")) {
  const loadMoreBtn = document.querySelector(".see_more-btn");
  let currentItem = 4;
  loadMoreBtn.addEventListener("click", (e) => {
    const btn = e.currentTarget;
    const elementList = [...document.querySelectorAll(".product_lst_item")];
    btn.classList.add("loading");

    for (let i = currentItem; i < currentItem + 4; i++) {
      setTimeout(function () {
        btn.classList.remove("loading");
        if (elementList[i]) {
          elementList[i].style.display = "block";
        }
      }, 1000);
    }
    currentItem += 4;

    if (currentItem >= elementList.length) {
      btn.classList.add("loaded");
    }
  });
}

if (document.querySelector("#accordion")) {
  const accordionHeaders = document.querySelectorAll(".filter_head");
  [...accordionHeaders].forEach((item) =>
    item.addEventListener("click", handleClickAccordion)
  );
  const activeStr = "is-active";
  function handleClickAccordion(e) {
    // [...document.querySelectorAll(".filter_body")].forEach((item) => {
    //   console.log(item);
    //   if (item.classList.contains("is-active")) {
    //     item.classList.remove("is-active");
    //     item.style.height = "0px";
    //   }
    // });
    const content = e.currentTarget.parentElement.querySelector(".filter_body");
    console.log(e.currentTarget.parentElement.parentElement);
    content.style.height = `${content.scrollHeight}px`;
    content.classList.toggle(activeStr);
    if (!content.classList.contains("is-active")) {
      content.style.height = "0px";
      console.log("ádf");
    }
    const icon = e.currentTarget.querySelector(".icon");
    if (icon.getAttribute("name") == "add-outline") {
      icon.setAttribute("name", "remove-outline");
    } else {
      icon.setAttribute("name", "add-outline");
    }
  }
}

if (document.querySelector(".quanlity_btn")) {
  let currentValue = 1;
  const numberQuality = document.querySelector(".number_quality");
  const numberQuanlityHidden = document.querySelector(
    ".number_quanlity-hidden"
  );
  function handleChangeQuanlity(action) {
    if (action === "minus") {
      currentValue = currentValue > 1 ? currentValue - 1 : 1;
    } else if (action === "plus") {
      currentValue++;
    }
    numberQuality.value = currentValue;
    numberQuanlityHidden.value = currentValue;
  }
}

if (document.querySelector(".select")) {
  async function fetchData(url) {
    const response = await fetch(url);
    const data = await response.json();
    return data;
  }

  async function getProvinces() {
    const provincesUrl = "https://provinces.open-api.vn/api/?depth=1";
    const provinces = await fetchData(provincesUrl);
    return provinces;
  }

  async function getDistricts() {
    const districtsUrl = `https://provinces.open-api.vn/api/d/`;
    const districts = await fetchData(districtsUrl);
    return districts;
  }

  async function getWards() {
    const wardsUrl = `https://provinces.open-api.vn/api/w/`;
    const wards = await fetchData(wardsUrl);
    return wards;
  }

  document
    .querySelector(".select_option_province")
    .addEventListener("click", displayProvinces);

  async function displayProvinces() {
    const ul = document.querySelector(".option_provinces");

    const provinces = await getProvinces();
    provinces.forEach((province) => {
      const li = `<li class="province" data-province-code = ${province.code}> ${province.name} </li>`;
      ul.innerHTML += li;
    });

    const provincesItem = document.querySelectorAll(".province");
    provincesItem.forEach((province) => {
      province.addEventListener("click", handleClickProvince);
    });

    async function handleClickProvince(e) {
      const selected = e.target.parentElement.parentElement;
      const select_text = selected.querySelector(".selected_text");
      select_text.innerHTML += "";
      select_text.innerHTML = e.target.innerText;
      document.querySelector(".valueProvince").value = e.target.innerText;

      const provinceID = e.target.dataset.provinceCode;

      const districts = await getDistricts();

      showDistrict(districts, provinceID);
    }
  }
  async function showDistrict(districts, provinceID) {
    let listDistrict = districts.filter(
      (item) => item.province_code == provinceID
    );
    const ul = document.querySelector(".option_districts");
    ul.innerHTML = "";
    listDistrict.forEach((district) => {
      const li = `<li class="district" data-district-code = ${district.code}> ${district.name} </li>`;
      ul.innerHTML += li;
    });

    const districtsItem = document.querySelectorAll(".district");

    districtsItem.forEach((district) => {
      district.addEventListener("click", handleClickDistrict);
    });
    async function handleClickDistrict(e) {
      const selected = e.target.parentElement.parentElement;
      const select_text = selected.querySelector(".selected_text");
      select_text.innerHTML = e.target.innerText;
      document.querySelector(".valueDistrict").value = e.target.innerText;

      const districtID = e.target.dataset.districtCode;
      const wards = await getWards();

      showWards(wards, districtID);
    }

    async function showWards(wards, districtID) {
      let listWard = wards.filter((item) => item.district_code == districtID);
      const ul = document.querySelector(".option_wards");
      ul.innerHTML = "";
      listWard.forEach((ward) => {
        const li = `<li class="ward" data-ward-code = ${ward.code}> ${ward.name} </li>`;
        ul.innerHTML += li;
      });

      const wardsItem = document.querySelectorAll(".ward");

      wardsItem.forEach((ward) => {
        ward.addEventListener("click", handleClickWard);
      });
      async function handleClickWard(e) {
        const selected = e.target.parentElement.parentElement;
        const select_text = selected.querySelector(".selected_text");
        select_text.innerHTML = e.target.innerText;
        document.querySelector(".valueWard").value = e.target.innerText;
      }
    }
  }
  displayProvinces();

  const selectsBtn = document.querySelectorAll(".select");
  let checkiconOption = true;
  let currentSelect = null;

  selectsBtn.forEach((selectBtn) => {
    selectBtn.addEventListener("click", handleClickShowSelect);
  });

  function handleClickShowSelect(e) {
    const option = e.currentTarget.querySelector(".option");
    const iconOption = e.currentTarget.querySelector(".fa-arrow-down");

    if (currentSelect && currentSelect !== option) {
      currentSelect.classList.remove("show");
      currentSelect.parentElement
        .querySelector(".fa-arrow-down")
        .classList.remove("fa-arrow-up");
    }

    option.classList.toggle("show");
    if (checkiconOption) {
      iconOption.classList.add("fa-arrow-up");
      checkiconOption = !checkiconOption;
    } else {
      iconOption.classList.remove("fa-arrow-up");
      checkiconOption = !checkiconOption;
    }

    currentSelect = option;
  }
}

if (document.querySelector(".rating")) {
  const iconStar = document.querySelectorAll(".item .icon_star");
  const rateHidden = document.querySelector(".rateHidden");

  iconStar.forEach((star, index1) => {
    star.addEventListener("click", () => {
      iconStar.forEach((star, index2) => {
        if (index1 >= index2) {
          star.style.fill = "#f59e0b";
          rateHidden.value = index1 + 1;
        } else {
          star.style.fill = "#000000";
        }
      });
    });
  });
}

if (document.querySelector(".member")) {
  const items = document.querySelectorAll(".side_bar_inner");
  items.forEach((item) => {
    item.addEventListener("click", () => {
      items.forEach((item) => {
        item.classList.contains("active")
          ? item.classList.remove("active")
          : "";
      });
      item.classList.add("active");
    });
  });
}

if (document.querySelector(".member")) {
  const accountBtn = document.querySelector(".account_btn");
  const editBtn = document.querySelector(".account_btn .edit");
  const formAccount = document.querySelector(".form_account");
  const cancel = document.querySelector(".cancel");
  editBtn?.addEventListener("click", () => {
    formAccount.classList.add("edit");
    accountBtn.classList.add("edit");
  });
  cancel?.addEventListener("click", () => {
    formAccount.classList.remove("edit");
    accountBtn.classList.remove("edit");
  });
}

if (document.querySelector(".row_item")) {
  const rowItem = document.querySelectorAll(".row_item");
  rowItem.forEach((item) => {
    const increaseBtns = item.querySelectorAll(".increase-button");
    const decreaseBtns = item.querySelectorAll(".decrease-button");
    let numberQuality = item.querySelector(".number_quality");
    let numberQuanlityHidden = item.querySelector(".number_quanlity-hidden");
    let numberTemPriceHidden = item.querySelector(".number_temPrice-hidden");
    let currentValue = numberQuality.value;

    increaseBtns.forEach((increaseBtn) => {
      increaseBtn.addEventListener("click", () => {
        numberQuanlityHidden.value++;
        let priceItem = item.querySelector(".number_price-hidden");
        let temPrice = item.querySelector(".temPrice");
        let currentPrice =
          parseInt(numberQuanlityHidden.value) * parseInt(priceItem.value);
        currentValue++;

        const numberAsFloat = parseFloat(currentPrice);
        const numberAsStringWithCommas = numberAsFloat.toLocaleString();
        temPrice.innerHTML = numberAsStringWithCommas + "VND";
        numberQuanlityHidden.value = currentValue;
        numberQuality.value = currentValue;
        numberTemPriceHidden.value = currentPrice;
        changeTotal("increase");
      });
    });

    decreaseBtns.forEach((decreaseBtn) => {
      decreaseBtn.addEventListener("click", () => {
        numberQuanlityHidden.value =
          numberQuanlityHidden.value > 1 ? numberQuanlityHidden.value - 1 : 1;
        console.log(numberQuanlityHidden.value);
        let priceItem = item.querySelector(".number_price-hidden");
        let temPrice = item.querySelector(".temPrice");
        let currentPrice =
          parseInt(numberQuanlityHidden.value) * parseInt(priceItem.value);
        currentValue = currentValue > 1 ? currentValue - 1 : 1;
        const numberAsFloat = parseFloat(currentPrice);
        const numberAsStringWithCommas = numberAsFloat.toLocaleString();
        temPrice.innerHTML = numberAsStringWithCommas + "VND";
        numberQuanlityHidden.value = currentValue;
        numberQuality.value = currentValue;
        numberTemPriceHidden.value = currentPrice;
        changeTotal("decrease");
      });
    });
  });

  function changeTotal(dir) {
    let temPrices = document.querySelectorAll(".number_temPrice-hidden");
    const totalPriceHidden = document.querySelector(".total-price-hidden");
    console.log(temPrices);
    let total = 0;
    temPrices.forEach((temPrice) => {
      console.log(dir);
      const value = parseFloat(temPrice.value);
      if (dir === "increase") {
        total += value;
      } else if (dir === "decrease") {
        console.log(value);
        // total -= value;
      }
      total += value;
    });
    const totalPrice = document.querySelector(".totalPrice");
    const numberAsFloat = parseFloat(total);
    const numberAsStringWithCommas = numberAsFloat.toLocaleString();
    totalPrice.innerHTML = numberAsStringWithCommas + "VND";
    totalPriceHidden.value = total;
  }
  changeTotal();
}

if (document.querySelector(".payment-method__item")) {
  const paymentMethods = document.querySelectorAll(".payment-method__item");

  paymentMethods.forEach((paymentMethod) => {
    paymentMethod.addEventListener("click", (e) => {
      const input = e.currentTarget.querySelector("input");
      paymentMethods.forEach((paymentMethod) => {
        paymentMethod.querySelector("input").checked = false;
        paymentMethod.classList.contains("active")
          ? paymentMethod.classList.remove("active")
          : "";
      });
      e.currentTarget.classList.add("active");
      input.checked = true;
      const checkout_method = input.value;
      document.querySelector(".checkout-input").value = checkout_method;
    });
  });
}

if (document.querySelector(".form")) {
  const btn = document.querySelector(".showPassBtn");
  const inputPasswords = document.querySelectorAll(".showPassword");

  btn.addEventListener("click", (e) => {
    inputPasswords.forEach((input) => {
      if (input.type == "password") {
        input.type = "text";
      } else {
        input.type = "password";
      }
    });
  });
}

if (document.querySelector(".comment")) {
  const comments = document.querySelectorAll(".comment");

  comments.forEach((comment) => {
    const reply_btn = comment.querySelectorAll(".reply_btn");
    reply_btn.forEach((btn) => {
      btn.addEventListener("click", () => {
        const reply_text = comment.querySelector(".reply_text");
        reply_text.classList.toggle("show");
      });
    });
  });
}
