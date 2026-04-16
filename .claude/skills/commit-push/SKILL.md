---
name: commit-push
description: Executa o fluxo completo de commit e push no repositório git atual. Usar quando o usuário quiser fazer deploy ou enviar alterações para o repositório remoto.
allowed-tools: [Bash]
---

Execute o seguinte fluxo de commit e push no repositório git do diretório atual:

1. Verifique o status com `git status`
2. Adicione todos os arquivos modificados com `git add .`
3. Gere uma mensagem de commit automática e descritiva com base nos arquivos alterados (ex: `feat: adiciona ferramenta X`, `fix: corrige Y`, `docs: atualiza CLAUDE.md`)
4. Faça o commit com essa mensagem
5. Execute `git push`
6. Confirme o sucesso e informe ao usuário: "Deploy enviado! Pode testar em: https://toolboxdevdesign.com.br"

Se ocorrer algum erro (autenticação, sem remote, conflito), explique o problema claramente em português e sugira como resolver.
