function createPagination(totalPages, page) {
    let element = document.querySelector(".pagination ul");
    let anchorTags = '';
    let active;
    let beforePage = page - 1;
    let afterPage = page + 1;
    
    if (page > 1) {
      anchorTags += `<a href="display-accessories.php?page=${page - 1}"><i class="fas fa-angle-left"></i> Prev</a>`;
    }

    if (page > 2) {
      anchorTags += `<a href="display-accessories.php?page=1">1</a>`;
    }

    if (page == totalPages) {
      beforePage = beforePage - 2;
    } else if (page == totalPages - 1) {
      beforePage = beforePage - 1;
    }

    if (page == 1) {
      afterPage = afterPage + 2;
    } else if (page == 2) {
      afterPage = afterPage + 1;
    }

    for (let i = beforePage; i <= afterPage; i++) {
      if (i > totalPages || i < 1) {
        continue;
      }
      if (page == i) {
        active = "active";
      } else {
        active = "";
      }
      anchorTags += `<a class="${active}" href="display-accessories.php?page=${i}">${i}</a>`;
    }

    if (page < totalPages - 1) {
      anchorTags += `<a href="display-accessories.php?page=${totalPages}">${totalPages}</a>`;
    }

    if (page < totalPages) {
      anchorTags += `<a href="display-accessories.php?page=${page + 1}">Next <i class="fas fa-angle-right"></i></a>`;
    }
    
    element.innerHTML = anchorTags;
  }