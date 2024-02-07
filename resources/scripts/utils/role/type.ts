import { permissions, roles } from "./data";

export type RoleType = typeof roles[number];
export type PermissionType = typeof permissions[number];
export type RolePermission = {
  readonly [key in RoleType]: readonly PermissionType[];
}

export interface HasRolePermission {
  role: RoleType | RoleType[];
  permissions?: PermissionType[];
}
