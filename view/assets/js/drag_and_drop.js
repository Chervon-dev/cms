document.querySelectorAll("#img_avatar").forEach(inputElement => {

    const dropZoneElement = inputElement.closest(".qwerty");

    if (avatarName) {

        dropZoneElement.querySelector(".avatar_img-prompt").remove();

        let thumbnailElement = dropZoneElement.querySelector(".avatar_img-thumb");

        if (!thumbnailElement) {
            thumbnailElement = document.createElement("div");
            thumbnailElement.classList.add("avatar_img-thumb");
            dropZoneElement.appendChild(thumbnailElement);
        }

        thumbnailElement.classList.toggle("tool");

        thumbnailElement.style.backgroundImage = `url('${avatarPath}')`;
    }

    dropZoneElement.addEventListener("click", e => {
        inputElement.click();
    });

    inputElement.addEventListener("change", e => {
        if (inputElement.files.length) {
            updateThumbnail(dropZoneElement, inputElement.files[0]);
        }
        user.updateAvatar();
    });

    dropZoneElement.addEventListener("dragover", e => {
        e.preventDefault();
        dropZoneElement.classList.add("qwerty--over");
    });

    ["dragleave", "dragend"].forEach(type => {
        dropZoneElement.addEventListener(type, e => {
            dropZoneElement.classList.remove("qwerty--over");
        });
    });

    dropZoneElement.addEventListener("drop", e => {
        e.preventDefault();

        if (e.dataTransfer.files.length) {
            inputElement.files = e.dataTransfer.files;
            console.log(inputElement.files);
            updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
        }

        dropZoneElement.classList.remove("qwerty--over");

        user.updateAvatar();
    });
});

function mySubStr(string = '') {
    if (string.length > 10) {
        return string.substr(0, 10) + '...';
    }
    return string;
}

function updateThumbnail(dropZoneElement, file) {

    let thumbnailElement = dropZoneElement.querySelector(".avatar_img-thumb");

    if (dropZoneElement.querySelector(".avatar_img-prompt")) {
        dropZoneElement.querySelector(".avatar_img-prompt").remove();
    }

    if (!thumbnailElement) {
        thumbnailElement = document.createElement("div");
        thumbnailElement.classList.add("avatar_img-thumb");
        dropZoneElement.appendChild(thumbnailElement);
    }

    thumbnailElement.classList.remove("tool");
    thumbnailElement.dataset.label = mySubStr(file.name);

    if (file.type.startsWith("image/")) {
        const reader = new FileReader();

        reader.readAsDataURL(file);
        reader.onload = () => {
            thumbnailElement.style.backgroundImage = `url('${ reader.result }')`;
        };
    } else {
        thumbnailElement.style.backgroundImage = null;
    }
}
