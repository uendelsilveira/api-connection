# Laravel API Connection

[![Latest Version](https://img.shields.io/packagist/v/uendel-silveira/api-connection.svg)](https://packagist.org/packages/uendel-silveira/api-connection)
[![Total Downloads](https://img.shields.io/packagist/dt/uendel-silveira/api-connection.svg)](https://packagist.org/packages/uendel-silveira/api-connection)
[![License](https://img.shields.io/packagist/l/uendel-silveira/api-connection.svg)](https://packagist.org/packages/uendel-silveira/api-connection)

Pacote Laravel para autenticação e conexão de APIs usando Laravel Passport com OAuth2.

## Requisitos

- PHP 8.2 ou superior
- Laravel 10.x ou 11.x
- Laravel Passport 12.x

## Instalação

Instale o pacote via Composer:

```bash
composer require uendel-silveira/api-connection
```

O service provider será automaticamente registrado.

### Publicar Configurações

Publique os arquivos de configuração:

```bash
php artisan vendor:publish --tag=auth-api-config
```

Publique as migrations:

```bash
php artisan vendor:publish --tag=auth-api-migrations
```

Execute as migrations:

```bash
php artisan migrate
```

## Configuração

Após publicar as configurações, edite o arquivo `config/auth-api.php` conforme necessário.

Configure suas variáveis de ambiente no arquivo `.env`:

```env
# Adicione as configurações necessárias
```

## Uso

### Básico

```php
// Exemplo de uso do pacote
```

## Testes

Execute os testes com:

```bash
composer test
```

Para gerar relatório de cobertura:

```bash
composer test-coverage
```

## Contribuindo

Contribuições são bem-vindas! Por favor, sinta-se à vontade para enviar um Pull Request.

### Processo de Contribuição

1. Fork o projeto
2. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

## Segurança

Se você descobrir algum problema de segurança, por favor envie um e-mail para [seu-email@exemplo.com] ao invés de usar o issue tracker.

## Créditos

- [Uendel Silveira](https://github.com/uendel-silveira)
- [Todos os Contribuidores](../../contributors)

## Licença

Este projeto está licenciado sob a Licença MIT - veja o arquivo [LICENSE](LICENSE) para detalhes.

