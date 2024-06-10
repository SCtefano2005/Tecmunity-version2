
    // Función para cargar la imagen a Cloudinary y enviar el formulario
    function handleSubmit(event) {
        event.preventDefault();

        const formData = new FormData(document.getElementById('publicarForm'));

        // Enviar el formulario al servidor
        axios.post('{{ route("publicaciones.store") }}', formData)
            .then(response => {
                // Manejar la respuesta del servidor
                console.log('Respuesta del servidor:', response.data);
                // Aquí puedes agregar lógica para mostrar un mensaje de éxito al usuario
            })
            .catch(error => {
                // Manejar errores de la solicitud
                console.error('Error al enviar el formulario:', error);
                // Aquí puedes agregar lógica para mostrar un mensaje de error al usuario
            });
    }

    // Función para cargar la imagen a Cloudinary
    function uploadImageToCloudinary(imageFile) {
        const CLOUDINARY_UPLOAD_URL = 'https://api.cloudinary.com/v1_1/dijr92ntz/image/upload';
        const formData = new FormData();
        formData.append('file', imageFile);
        formData.append('upload_preset', 'YOUR_UPLOAD_PRESET'); // Cambiar a tu upload preset de Cloudinary

        return axios.post(CLOUDINARY_UPLOAD_URL, formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        });
    }


    function previewMedia(event) {
        const file = event.target.files[0];
        if (file) {
            uploadImageToCloudinary(file)
                .then(response => {
                    const imageUrl = response.data.secure_url;
                    console.log('Imagen cargada a Cloudinary:', imageUrl);
                    // Aquí puedes agregar lógica para mostrar la imagen previa al usuario
                    // Por ejemplo, asignar la URL de la imagen a un elemento <img> en tu página
                    document.getElementById('previewImage').src = imageUrl;
                })
                .catch(error => {
                    console.error('Error al cargar la imagen a Cloudinary:', error);
                });
        }
    }

    // Asignar el manejador de eventos al formulario
    const form = document.getElementById('publicarForm');
    form.addEventListener('submit', handleSubmit);

    // Asignar el manejador de eventos al input de imagen
    const inputMedia = document.getElementById('input-media');
    inputMedia.addEventListener('change', previewMedia);

    function openModal(imageSrc) {
        document.getElementById('myModal').style.display = "block";
        document.getElementById('imgModal').src = imageSrc;
    }
    
    function closeModal() {
        document.getElementById('myModal').style.display = "none";
    }
    
    // Cierra el modal cuando se hace clic fuera de la imagen
    window.onclick = function(event) {
        var modal = document.getElementById('myModal');
        if (event.target == modal) {
            closeModal();
        }
    }

    
    