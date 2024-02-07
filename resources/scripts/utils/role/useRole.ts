import { rolePermission } from "./data";
import { PermissionType, HasRolePermission, RoleType, RolePermission } from "./type";

export function useRole(user?: HasRolePermission) {
  const userPermissions: PermissionType[] = [];
  const userRoles: RoleType[] = [];
  const rolePermissions = rolePermission as Partial<RolePermission>;

  if (user) {
    userRoles.push(...(Array.isArray(user.role) ? user.role : [user.role]));

    for (const roleItem of userRoles) {
      userPermissions.push(...rolePermissions[roleItem] ?? []);
    }

    if (user.permissions && user.permissions.length > 0) {
      userPermissions.push(...user.permissions);
    }
  }

  const hasOnePermission = (permission: PermissionType | PermissionType[]): boolean => {
    if (userPermissions.length < 1) {
      return false;
    }

    const permissionsToCheck = Array.isArray(permission) ? permission : [permission];

    for (const permissionItem of permissionsToCheck) {
      if (userPermissions.includes(permissionItem)) {
        return true;
      }
    }

    return false;
  };

  const hasAllPermission = (permissions: PermissionType[]): boolean => {
    if (userPermissions.length < 1) {
      return false;
    }

    for (const permissionItem of permissions) {
      if (!userPermissions.includes(permissionItem)) {
        return false;
      }
    }

    return true;
  };

  const hasPermission = (permission: PermissionType | PermissionType[], all = false): boolean => {
    const permissionsToCheck = Array.isArray(permission) ? permission : [permission];

    if (all) {
      return hasAllPermission(permissionsToCheck);
    }

    return hasOnePermission(permissionsToCheck);
  };

  const hasRole = (role: RoleType | RoleType[]): boolean => {
    if (userRoles.length < 1) {
      return false;
    }

    const rolesToCheck = Array.isArray(role) ? role : [role];

    for (const roleItem of rolesToCheck) {
      if (userRoles.includes(roleItem)) {
        return true;
      }
    }

    return false;
  }

  return {
    hasPermission,
    hasOnePermission,
    hasAllPermission,
    hasRole,
  };
}
