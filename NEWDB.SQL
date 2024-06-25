

-- Tabla de usuarios
CREATE TABLE Usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    rol ENUM('Paciente', 'Medico') NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de pacientes
CREATE TABLE Pacientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    fecha_nacimiento DATE,
    direccion VARCHAR(255),
    telefono VARCHAR(15),
    FOREIGN KEY (usuario_id) REFERENCES Usuarios(id) ON DELETE CASCADE
);

-- Tabla de médicos
CREATE TABLE Medicos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    especialidad VARCHAR(100),
    numero_colegiatura VARCHAR(50),
    telefono VARCHAR(15),
    FOREIGN KEY (usuario_id) REFERENCES Usuarios(id) ON DELETE CASCADE
);

-- Tabla de citas
CREATE TABLE Citas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    paciente_id INT NOT NULL,
    medico_id INT NOT NULL,
    fecha_hora DATETIME NOT NULL,
    estado ENUM('Programada', 'Cancelada', 'Completada') DEFAULT 'Programada',
    FOREIGN KEY (paciente_id) REFERENCES Pacientes(id) ON DELETE CASCADE,
    FOREIGN KEY (medico_id) REFERENCES Medicos(id) ON DELETE CASCADE
);

-- Tabla de historial médico
CREATE TABLE HistorialMedico (
    id INT AUTO_INCREMENT PRIMARY KEY,
    paciente_id INT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    descripcion TEXT,
    FOREIGN KEY (paciente_id) REFERENCES Pacientes(id) ON DELETE CASCADE
);

-- Tabla de diagnósticos
CREATE TABLE Diagnosticos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cita_id INT NOT NULL,
    medico_id INT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    diagnostico TEXT,
    recomendaciones TEXT,
    FOREIGN KEY (cita_id) REFERENCES Citas(id) ON DELETE CASCADE,
    FOREIGN KEY (medico_id) REFERENCES Medicos(id) ON DELETE CASCADE
);

-- Tabla de recetas médicas
CREATE TABLE RecetasMedicas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    diagnostico_id INT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    receta TEXT,
    archivo_receta VARCHAR(255),
    FOREIGN KEY (diagnostico_id) REFERENCES Diagnosticos(id) ON DELETE CASCADE
);

-- Tabla de mensajes (para comunicación interna)
CREATE TABLE Mensajes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    remitente_id INT NOT NULL,
    destinatario_id INT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    mensaje TEXT,
    FOREIGN KEY (remitente_id) REFERENCES Usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (destinatario_id) REFERENCES Usuarios(id) ON DELETE CASCADE
);
