describe('empty spec', () => {
    it('passes', () => {
      cy.visit('http://127.0.0.1:8000/')
      cy.get(':nth-child(2) > .form-control').type('superadmin@gmail.com')
      cy.get(':nth-child(3) > .form-control').type('password')
      cy.get('.btn').click()
      cy.visit('http://127.0.0.1:8000/user-management/user')
      cy.get(':nth-child(4) > .text-right > .d-flex > .ml-2 > .btn').click()
    })
  })