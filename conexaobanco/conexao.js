/**
 *  Alterar as configurações de host, user, password, database
 * 
 */

const mysql = require('mysql2');

// Configurações do banco de dados
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: 'root',
    database: 'nomes'
});

// Conectar ao banco de dados
db.connect((err) => {
    if (err) {
        console.error('Erro ao conectar ao banco de dados:', err);
    } else {
        console.log('Conectado ao banco de dados MySQL');
        // Aqui você pode realizar operações adicionais com o banco de dados, se necessário
        // Por exemplo, consultas, inserções, atualizações, etc.
    }
});

// Lidar com erros durante a conexão
db.on('error', (err) => {
    console.error('Erro na conexão do banco de dados:', err);
    if (err.code === 'PROTOCOL_CONNECTION_LOST') {
        console.log('Conexão com o banco de dados foi perdida. Tentando reconectar...');
        // Reconectar em caso de perda de conexão
        db.connect();
    } else {
        throw err;
    }
});

module.exports = db;