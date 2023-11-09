// Fechar a conexão ao encerrar a aplicação (por exemplo, ao receber um sinal)

const db = require('./conexao');

process.on('SIGINT', () => {
    db.end((err) => {
        if (err) {
            return console.error('Erro ao fechar a conexão do banco de dados:', err.message);
        }
        console.log('Conexão com o banco de dados fechada.');
        process.exit();
    });
});
