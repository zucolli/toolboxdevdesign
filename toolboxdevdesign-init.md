# Toolbox Dev Design — Setup em nova máquina (macOS)

Guia para replicar o ambiente de desenvolvimento localmente no trabalho.

---

## Pré-requisitos

- macOS com Apple Silicon ou Intel
- VS Code instalado com sua conta pessoal
- Git configurado (`git config --global user.name` e `user.email`)
- Acesso ao repositório: `https://github.com/zucolli/toolboxdevdesign.git`

---

## 1. Ativar Apache nativo do macOS

O projeto roda no Apache embutido no macOS (não precisa instalar nada extra).

```bash
# Iniciar Apache
sudo apachectl start

# Verificar se está rodando
curl -s http://localhost/ | head -5
```

---

## 2. Habilitar mod_rewrite e PHP no Apache

Edite o arquivo de configuração principal:

```bash
sudo nano /etc/apache2/httpd.conf
```

Descomente (remova o `#`) as seguintes linhas:

```
LoadModule rewrite_module libexec/apache2/mod_rewrite.so
LoadModule php_module libexec/apache2/libphp.dylib
# ou, dependendo da versão do macOS:
LoadModule php7_module libexec/apache2/libphp7.so
```

Ainda no mesmo arquivo, localize o bloco `<Directory "/Library/WebServer/Documents">` e troque `AllowOverride None` por:

```
AllowOverride All
```

---

## 3. Habilitar UserDir (pasta ~/Sites)

### 3a. Ativar o módulo

No `httpd.conf`, descomente:

```
LoadModule userdir_module libexec/apache2/mod_userdir.so
```

E também:

```
Include /private/etc/apache2/extra/httpd-userdir.conf
```

### 3b. Configurar o userdir

```bash
sudo nano /etc/apache2/extra/httpd-userdir.conf
```

Descomente a linha:

```
Include /private/etc/apache2/users/*.conf
```

### 3c. Criar o arquivo de usuário

Substitua `SEUUSUARIO` pelo seu nome de usuário do macOS (`whoami` mostra):

```bash
sudo nano /etc/apache2/users/SEUUSUARIO.conf
```

Cole o conteúdo abaixo (ajuste o path):

```apache
<Directory "/Users/SEUUSUARIO/Sites/">
    Options Indexes MultiViews FollowSymLinks
    AllowOverride All
    Require all granted
</Directory>
```

---

## 4. Habilitar PHP para o UserDir

```bash
sudo nano /etc/apache2/other/php7.conf
```

Se o arquivo não existir, crie com:

```apache
<IfModule php_module>
    AddType application/x-httpd-php .php
    AddType application/x-httpd-php-source .phps

    <IfModule dir_module>
        DirectoryIndex index.html index.php
    </IfModule>
</IfModule>
```

---

## 5. Criar a pasta Sites e clonar o projeto

```bash
# Criar a pasta ~/Sites se não existir
mkdir -p ~/Sites

# Clonar o repositório
cd ~/Sites
git clone https://github.com/zucolli/toolboxdevdesign.git
```

---

## 6. Reiniciar o Apache

```bash
sudo apachectl restart
```

---

## 7. Testar

Abra no navegador:

```
http://localhost/~SEUUSUARIO/toolboxdevdesign/
```

Se tudo estiver correto, a página inicial do Toolbox Dev Design vai carregar com PHP funcionando.

---

## 8. Abrir no VS Code

```bash
code ~/Sites/toolboxdevdesign
```

---

## 9. Instalar extensões recomendadas no VS Code

| Extensão | ID |
|---|---|
| PHP Intelephense | `bmewburn.vscode-intelephense-client` |
| Claude Code | `anthropic.claude-code` (se disponível no marketplace) |
| GitLens | `eamodio.gitlens` |

---

## 10. Configurar Shift+Enter no terminal do VS Code (Claude Code)

Abra o arquivo de keybindings do VS Code:

`Cmd+Shift+P` → "Open Keyboard Shortcuts (JSON)"

Cole o conteúdo abaixo (ou adicione ao array existente):

```json
[
    {
        "key": "shift+enter",
        "command": "workbench.action.terminal.sendSequence",
        "args": {
            "text": "\u001b\r"
        },
        "when": "terminalFocus"
    }
]
```

---

## Troubleshooting

**Apache não inicia:**
```bash
sudo apachectl configtest
# Mostra erros de sintaxe no httpd.conf
```

**PHP não executa (mostra código-fonte):**
- Confirme que o módulo PHP está descomentado no `httpd.conf`
- Confirme que `AllowOverride All` está ativo para o diretório

**Erro 403 Forbidden:**
- Confirme que o arquivo `/etc/apache2/users/SEUUSUARIO.conf` existe e tem o path correto
- Confirme que a pasta `~/Sites/` tem permissão de leitura: `chmod +r ~/Sites`

**Rewrite não funciona (rotas 404):**
- Confirme que `mod_rewrite` está carregado
- Confirme que `AllowOverride All` está ativo no bloco do diretório do usuário

---

## Referência rápida

| Comando | Ação |
|---|---|
| `sudo apachectl start` | Inicia o Apache |
| `sudo apachectl stop` | Para o Apache |
| `sudo apachectl restart` | Reinicia o Apache |
| `sudo apachectl configtest` | Valida a configuração |
| `tail -f /var/log/apache2/error_log` | Ver erros em tempo real |
