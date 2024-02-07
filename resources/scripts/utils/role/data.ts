const roles = ["superadmin", "admin", "user"] as const;
const permissions = ["view.users", "create.users", "edit.users", "delete.users"] as const;
const rolePermission = { "superadmin": ["view.users", "create.users", "edit.users", "delete.users"], "admin": [] } as const;

export {
  roles,
  permissions,
  rolePermission,
};
