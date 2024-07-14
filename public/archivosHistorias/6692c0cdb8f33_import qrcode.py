import qrcode

# Texto para el cual deseas generar el código QR
data = "72153996|3|11228"

# Crear la instancia de QRCode
qr = qrcode.QRCode(
    version=1,  # Tamaño del código QR (1 es el más pequeño)
    error_correction=qrcode.constants.ERROR_CORRECT_L,  # Nivel de corrección de errores
    box_size=10,  # Tamaño de cada cuadro en el código QR
    border=4,  # Tamaño del borde (4 es el mínimo)
)

# Agregar datos al código QR
qr.add_data(data)
qr.make(fit=True)

# Crear una imagen del código QR
img = qr.make_image(fill_color="black", back_color="white")

# Guardar la imagen en un archivo
img.save("codigo_qr.png")

# Mostrar la imagen (opcional)
img.show()